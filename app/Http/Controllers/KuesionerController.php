<?php

namespace App\Http\Controllers;

use App\Models\Analisis;
use App\Models\Detail;
use App\Models\Hasil;
use App\Models\Jawaban;
use App\Models\Kriteria;
use App\Models\KriteriaSub;
use App\Models\Pertanyaan;
use App\Models\TipeKriteria;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class KuesionerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Kuesioner';
        // $data['pertanyaan'] = Pertanyaan::orderBy('tipe_kriteria')->get()->groupBy('tipe_kriteria');
        $data['kriteria'] = Kriteria::orderBy('id')->get();
        $data['exist'] = Hasil::where('user_id', Auth::user()->id)->get();
        return view('apps.kuesioner.index', compact('data', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $existingData = Hasil::where('kriteria_id', $request->kriteria_id)->where('user_id', Auth::user()->id)->exists();
        if($existingData == true){
            Jawaban::where('kriteria_id', $request->kriteria_id)->where('user_id', Auth::user()->id)->delete();
            Analisis::where('kriteria_id', $request->kriteria_id)->where('user_id', Auth::user()->id)->delete();
            $hasil = Hasil::with('Detail')->where('kriteria_id', $request->kriteria_id)->where('user_id', Auth::user()->id)->first();
            if ($hasil) {
                // Hapus relasi Detail terlebih dahulu
                foreach ($hasil->Detail as $detail) {
                    $detail->delete();
                }
                
                // Hapus data utama Hasil
                $hasil->delete();
            }
        }
        foreach ($request->jawaban as $perbandingan => $jawabanFase) {
            foreach ($jawabanFase as $pertanyaan_id => $jawaban) {
                // Menghitung sum jawaban
                Jawaban::create([
                    'user_id' => Auth::user()->id, // Sesuaikan dengan model dan kolom yang sesuai
                    'kriteria_id' => $request->kriteria_id,
                    'pertanyaan_id' => $pertanyaan_id,
                    'perbandingan_code' => $perbandingan,
                    'jawaban' => $jawaban,
                ]);
            }
        }
        $jawaban = Jawaban::where('user_id', Auth::user()->id)->where('kriteria_id', $request->kriteria_id)->groupBy('perbandingan_code')->selectRaw('*, sum(jawaban) as skor')->get();
        foreach($jawaban as $row){
             // Mapping skala
            $skalaMapping = [
                0 => 0.14,
                1 => 1,
                2 => 3,
                3 => 5,
                4 => 7,
            ];

            // Mendapatkan skala berdasarkan skor
            $skala = $skalaMapping[$row->skor];

            // Membuat record di tabel Analisis
            Analisis::create([
                'kriteria_id' => $row->kriteria_id,
                'perbandingan_code' => $row->perbandingan_code,
                'user_id' => $row->user_id,
                'skala' => $skala,
            ]);
        }
        $data['analisis'] = Analisis::with('User')->where('user_id', Auth::user()->id)->where('kriteria_id', $request->kriteria_id)->get();
        if($request->kriteria_id == 3){
            $data['skalaValues'] = $data['analisis']->pluck('skala')->values()->all();
            $data['kolomLabels'] = ['C1', 'C2', 'C3', 'C4'];
            $data['barisLabels'] = ['C1', 'C2', 'C3', 'C4'];
            /////////////////////////////     Pairwise Comparisons    /////////////////////////////
            $data['pairwise'] = [
                'C1' => [1, $data['skalaValues'][0], $data['skalaValues'][1], $data['skalaValues'][2]],
                'C2' => [round(1/$data['skalaValues'][0], 2), 1, $data['skalaValues'][3], $data['skalaValues'][4]],
                'C3' => [round(1/$data['skalaValues'][1], 2), round(1/$data['skalaValues'][3], 2), 1, $data['skalaValues'][5]],
                'C4' => [round(1/$data['skalaValues'][2], 2), round(1/$data['skalaValues'][4], 2), round(1/$data['skalaValues'][5], 2), 1],
            ];
            $data['pairwise_total'] = [
                'C1' => $data['pairwise']['C1'][0]+$data['pairwise']['C2'][0]+$data['pairwise']['C3'][0]+$data['pairwise']['C4'][0],
                'C2' => $data['pairwise']['C1'][1]+$data['pairwise']['C2'][1]+$data['pairwise']['C3'][1]+$data['pairwise']['C4'][1],
                'C3' => $data['pairwise']['C1'][2]+$data['pairwise']['C2'][2]+$data['pairwise']['C3'][2]+$data['pairwise']['C4'][2],
                'C4' => $data['pairwise']['C1'][3]+$data['pairwise']['C2'][3]+$data['pairwise']['C3'][3]+$data['pairwise']['C4'][3],
            ];
            ////////////////////////////  Batas Pairwise Comparisons    ///////////////////////////

            ///////////////////////////  Pencarian Eigen Vektor Normalisasi    ////////////////////
            $e1 = [
                'a1' => [$data['pairwise']['C1'][0]*$data['pairwise']['C1'][0], $data['pairwise']['C1'][1]*$data['pairwise']['C2'][0], $data['pairwise']['C1'][2]*$data['pairwise']['C3'][0], $data['pairwise']['C1'][3]*$data['pairwise']['C4'][0]],
                'a2' => [$data['pairwise']['C1'][0]*$data['pairwise']['C1'][1], $data['pairwise']['C1'][1]*$data['pairwise']['C2'][1], $data['pairwise']['C1'][2]*$data['pairwise']['C3'][1], $data['pairwise']['C1'][3]*$data['pairwise']['C4'][1]],
                'a3' => [$data['pairwise']['C1'][0]*$data['pairwise']['C1'][2], $data['pairwise']['C1'][1]*$data['pairwise']['C2'][2], $data['pairwise']['C1'][2]*$data['pairwise']['C3'][2], $data['pairwise']['C1'][3]*$data['pairwise']['C4'][2]],
                'a4' => [$data['pairwise']['C1'][0]*$data['pairwise']['C1'][3], $data['pairwise']['C1'][1]*$data['pairwise']['C2'][3], $data['pairwise']['C1'][2]*$data['pairwise']['C3'][3], $data['pairwise']['C1'][3]*$data['pairwise']['C4'][3]],
            ];
            $data['baris-1'] = [
                'C1' => [$e1['a1'][0], $e1['a1'][1], $e1['a1'][2], $e1['a1'][3]],
                'C2' => [$e1['a2'][0], $e1['a2'][1], $e1['a2'][2], $e1['a2'][3]],
                'C3' => [$e1['a3'][0], $e1['a3'][1], $e1['a3'][2], $e1['a3'][3]],
                'C4' => [$e1['a4'][0], $e1['a4'][1], $e1['a4'][2], $e1['a4'][3]],
            ];
    
            $e2 = [
                'a1' => [$data['pairwise']['C2'][0]*$data['pairwise']['C1'][0], $data['pairwise']['C2'][1]*$data['pairwise']['C2'][0], $data['pairwise']['C2'][2]*$data['pairwise']['C3'][0], $data['pairwise']['C2'][3]*$data['pairwise']['C4'][0]],
                'a2' => [$data['pairwise']['C2'][0]*$data['pairwise']['C1'][1], $data['pairwise']['C2'][1]*$data['pairwise']['C2'][1], $data['pairwise']['C2'][2]*$data['pairwise']['C3'][1], $data['pairwise']['C2'][3]*$data['pairwise']['C4'][1]],
                'a3' => [$data['pairwise']['C2'][0]*$data['pairwise']['C1'][2], $data['pairwise']['C2'][1]*$data['pairwise']['C2'][2], $data['pairwise']['C2'][2]*$data['pairwise']['C3'][2], $data['pairwise']['C2'][3]*$data['pairwise']['C4'][2]],
                'a4' => [$data['pairwise']['C2'][0]*$data['pairwise']['C1'][3], $data['pairwise']['C2'][1]*$data['pairwise']['C2'][3], $data['pairwise']['C2'][2]*$data['pairwise']['C3'][3], $data['pairwise']['C2'][3]*$data['pairwise']['C4'][3]],
            ];
            $data['baris-2'] = [
                'C1' => [$e2['a1'][0], $e2['a1'][1], $e2['a1'][2], $e2['a1'][3]],
                'C2' => [$e2['a2'][0], $e2['a2'][1], $e2['a2'][2], $e2['a2'][3]],
                'C3' => [$e2['a3'][0], $e2['a3'][1], $e2['a3'][2], $e2['a3'][3]],
                'C4' => [$e2['a4'][0], $e2['a4'][1], $e2['a4'][2], $e2['a4'][3]],
            ];
    
            $e3 = [
                'a1' => [$data['pairwise']['C3'][0]*$data['pairwise']['C1'][0], $data['pairwise']['C3'][1]*$data['pairwise']['C2'][0], $data['pairwise']['C3'][2]*$data['pairwise']['C3'][0], $data['pairwise']['C3'][3]*$data['pairwise']['C4'][0]],
                'a2' => [$data['pairwise']['C3'][0]*$data['pairwise']['C1'][1], $data['pairwise']['C3'][1]*$data['pairwise']['C2'][1], $data['pairwise']['C3'][2]*$data['pairwise']['C3'][1], $data['pairwise']['C3'][3]*$data['pairwise']['C4'][1]],
                'a3' => [$data['pairwise']['C3'][0]*$data['pairwise']['C1'][2], $data['pairwise']['C3'][1]*$data['pairwise']['C2'][2], $data['pairwise']['C3'][2]*$data['pairwise']['C3'][2], $data['pairwise']['C3'][3]*$data['pairwise']['C4'][2]],
                'a4' => [$data['pairwise']['C3'][0]*$data['pairwise']['C1'][3], $data['pairwise']['C3'][1]*$data['pairwise']['C2'][3], $data['pairwise']['C3'][2]*$data['pairwise']['C3'][3], $data['pairwise']['C3'][3]*$data['pairwise']['C4'][3]],
            ];
            $data['baris-3'] = [
                'C1' => [$e3['a1'][0], $e3['a1'][1], $e3['a1'][2], $e3['a1'][3]],
                'C2' => [$e3['a2'][0], $e3['a2'][1], $e3['a2'][2], $e3['a2'][3]],
                'C3' => [$e3['a3'][0], $e3['a3'][1], $e3['a3'][2], $e3['a3'][3]],
                'C4' => [$e3['a4'][0], $e3['a4'][1], $e3['a4'][2], $e3['a4'][3]],
            ];

            $e4 = [
                'a1' => [$data['pairwise']['C4'][0]*$data['pairwise']['C1'][0], $data['pairwise']['C4'][1]*$data['pairwise']['C2'][0], $data['pairwise']['C4'][2]*$data['pairwise']['C3'][0], $data['pairwise']['C4'][3]*$data['pairwise']['C4'][0]],
                'a2' => [$data['pairwise']['C4'][0]*$data['pairwise']['C1'][1], $data['pairwise']['C4'][1]*$data['pairwise']['C2'][1], $data['pairwise']['C4'][2]*$data['pairwise']['C3'][1], $data['pairwise']['C4'][3]*$data['pairwise']['C4'][1]],
                'a3' => [$data['pairwise']['C4'][0]*$data['pairwise']['C1'][2], $data['pairwise']['C4'][1]*$data['pairwise']['C2'][2], $data['pairwise']['C4'][2]*$data['pairwise']['C3'][2], $data['pairwise']['C4'][3]*$data['pairwise']['C4'][2]],
                'a4' => [$data['pairwise']['C4'][0]*$data['pairwise']['C1'][3], $data['pairwise']['C4'][1]*$data['pairwise']['C2'][3], $data['pairwise']['C4'][2]*$data['pairwise']['C3'][3], $data['pairwise']['C4'][3]*$data['pairwise']['C4'][3]],
            ];
            $data['baris-4'] = [
                'C1' => [$e4['a1'][0], $e4['a1'][1], $e4['a1'][2], $e4['a1'][3]],
                'C2' => [$e4['a2'][0], $e4['a2'][1], $e4['a2'][2], $e4['a2'][3]],
                'C3' => [$e4['a3'][0], $e4['a3'][1], $e4['a3'][2], $e4['a3'][3]],
                'C4' => [$e4['a4'][0], $e4['a4'][1], $e4['a4'][2], $e4['a4'][3]],
            ];
            /////////////////////    Batas Perncarian Eigen Vektor Normalisasi   ///////////////////
            
            ////////////////////////    Eigen Vektor Normalisasi   ////////////////////////////////

            $data['evn'] = [
                'C1' => [array_sum($data['baris-1']['C1']), array_sum($data['baris-1']['C2']), array_sum($data['baris-1']['C3']), array_sum($data['baris-1']['C4'])],
                'C2' => [array_sum($data['baris-2']['C1']), array_sum($data['baris-2']['C2']), array_sum($data['baris-2']['C3']), array_sum($data['baris-2']['C4'])],
                'C3' => [array_sum($data['baris-3']['C1']), array_sum($data['baris-3']['C2']), array_sum($data['baris-3']['C3']), array_sum($data['baris-3']['C4'])],
                'C4' => [array_sum($data['baris-4']['C1']), array_sum($data['baris-4']['C2']), array_sum($data['baris-4']['C3']), array_sum($data['baris-4']['C4'])],
            ];
            $sumEvn = (array_sum($data['evn']['C1'])+array_sum($data['evn']['C2'])+array_sum($data['evn']['C3'])+array_sum($data['evn']['C4']));
            $data['evnTotal'] = [
                'C1'=> [array_sum($data['evn']['C1']), array_sum($data['evn']['C1'])/$sumEvn],
                'C2'=> [array_sum($data['evn']['C2']), array_sum($data['evn']['C2'])/$sumEvn],
                'C3'=> [array_sum($data['evn']['C3']), array_sum($data['evn']['C3'])/$sumEvn],
                'C4'=> [array_sum($data['evn']['C4']), array_sum($data['evn']['C4'])/$sumEvn],
            ];
            ///////////////////////  Batas Eigen Vektor Normalisasi  /////////////////////////////

            ////////////////////////    Rasio Konsistensi   ////////////////////////////////

            $data['kolomRasio'] = ['Emaks', 'CI', 'CR'];
            $eMaks = [
                'C1' => $data['pairwise_total']['C1']*$data['evnTotal']['C1'][1],
                'C2' => $data['pairwise_total']['C2']*$data['evnTotal']['C2'][1],
                'C3' => $data['pairwise_total']['C3']*$data['evnTotal']['C3'][1],
                'C4' => $data['pairwise_total']['C4']*$data['evnTotal']['C4'][1],
            ];
            $n = KriteriaSub::where('kriteria_id', $request->kriteria_id)->count();

            $randomIndexConsistency = '';
            if($n == 3){
                $randomIndexConsistency = 0.58;
            }elseif($n == 4){
                $randomIndexConsistency = 0.90;
            }elseif($n == 5){
                $randomIndexConsistency = 1.12;
            }elseif($n == 6){
                $randomIndexConsistency = 1.24;
            }elseif($n == 7){
                $randomIndexConsistency = 1.32;
            }elseif($n == 8){
                $randomIndexConsistency = 1.41;
            }
            $data['barisRasio'] = [
                'Emaks' => array_sum($eMaks),
                'CI' => (array_sum($eMaks)-$n)/($n-1),
                'CR' => ((array_sum($eMaks)-$n)/($n-1))/$randomIndexConsistency,
            ];

            ///////////////////////  Batas Rasio Konsistensi  /////////////////////////////

            $c1 = $data['evnTotal']['C1'][1] > $data['evnTotal']['C2'][1] && $data['evnTotal']['C1'][1] > $data['evnTotal']['C3'][1] && $data['evnTotal']['C1'][1] > $data['evnTotal']['C4'][1];
            $c2 = $data['evnTotal']['C2'][1] > $data['evnTotal']['C1'][1] && $data['evnTotal']['C2'][1] > $data['evnTotal']['C3'][1] && $data['evnTotal']['C2'][1] > $data['evnTotal']['C4'][1];
            $c3 = $data['evnTotal']['C3'][1] > $data['evnTotal']['C1'][1] && $data['evnTotal']['C3'][1] > $data['evnTotal']['C2'][1] && $data['evnTotal']['C3'][1] > $data['evnTotal']['C4'][1];
            $c4 = $data['evnTotal']['C4'][1] > $data['evnTotal']['C1'][1] && $data['evnTotal']['C4'][1] > $data['evnTotal']['C2'][1] && $data['evnTotal']['C4'][1] > $data['evnTotal']['C3'][1];


            $nilaiTertinggi = '';
            if ($c1) {
                $tipekriteria = KriteriaSub::where('kriteria_id', $request->kriteria_id)->where('nama', 'Kemampuan Menguasai Konsep')->first();
                $nilaiTertinggi = 'Unggul di '.$tipekriteria->nama;
            } elseif ($c2) {
                $tipekriteria = KriteriaSub::where('kriteria_id', $request->kriteria_id)->where('nama', 'Kemampuan Menjelaskan Informasi')->first();
                $nilaiTertinggi = 'Unggul di '.$tipekriteria->nama;
            } elseif ($c3) {
                $tipekriteria = KriteriaSub::where('kriteria_id', $request->kriteria_id)->where('nama', 'Kemampuan Menyampaikan Fakta')->first();
                $nilaiTertinggi = 'Unggul di '.$tipekriteria->nama;
            } elseif ($c4){
                $tipekriteria = KriteriaSub::where('kriteria_id', $request->kriteria_id)->where('nama', 'Kemampuan Mengutarakan Ide dan Gagasan')->first();
                $nilaiTertinggi = 'Unggul di '.$tipekriteria->nama;
            }

            $data['hasil'] = Hasil::create([
                'user_id' => Auth::user()->id,
                'kriteria_id' => $request->kriteria_id,
                'nim' => Auth::user()->nim,
                'kesimpulan' => $nilaiTertinggi,
            ]);
            
            foreach ($data['evnTotal'] as $item => $row) {
                $data['detail'] = Detail::create([
                    'hasil_id' => $data['hasil']->id,
                    'perbandingan_code' => $item,
                    'totalEvn' => round($row[1], 2)
                ]);
            }
        }elseif ($request->kriteria_id == 2){
            $data['skalaValues'] = $data['analisis']->pluck('skala')->values()->all();
            $data['kolomLabels'] = ['C1', 'C2', 'C3', 'C4', 'C5'];
            $data['barisLabels'] = ['C1', 'C2', 'C3', 'C4', 'C5'];
            /////////////////////////////     Pairwise Comparisons    /////////////////////////////
            $data['pairwise'] = [
                'C1' => [1, $data['skalaValues'][0], $data['skalaValues'][1], $data['skalaValues'][2], $data['skalaValues'][3]],
                'C2' => [round(1/$data['skalaValues'][0], 2), 1, $data['skalaValues'][4], $data['skalaValues'][5], $data['skalaValues'][6]],
                'C3' => [round(1/$data['skalaValues'][1], 2), round(1/$data['skalaValues'][4], 2), 1, $data['skalaValues'][7], $data['skalaValues'][8]],
                'C4' => [round(1/$data['skalaValues'][2], 2), round(1/$data['skalaValues'][5], 2), round(1/$data['skalaValues'][7], 2), 1, $data['skalaValues'][9]],
                'C5' => [round(1/$data['skalaValues'][3], 2), round(1/$data['skalaValues'][6], 2), round(1/$data['skalaValues'][8], 2), round(1/$data['skalaValues'][9], 2), 1],
            ];
            $data['pairwise_total'] = [
                'C1' => $data['pairwise']['C1'][0]+$data['pairwise']['C2'][0]+$data['pairwise']['C3'][0]+$data['pairwise']['C4'][0]+$data['pairwise']['C5'][0],
                'C2' => $data['pairwise']['C1'][1]+$data['pairwise']['C2'][1]+$data['pairwise']['C3'][1]+$data['pairwise']['C4'][1]+$data['pairwise']['C5'][1],
                'C3' => $data['pairwise']['C1'][2]+$data['pairwise']['C2'][2]+$data['pairwise']['C3'][2]+$data['pairwise']['C4'][2]+$data['pairwise']['C5'][2],
                'C4' => $data['pairwise']['C1'][3]+$data['pairwise']['C2'][3]+$data['pairwise']['C3'][3]+$data['pairwise']['C4'][3]+$data['pairwise']['C5'][3],
                'C5' => $data['pairwise']['C1'][4]+$data['pairwise']['C2'][4]+$data['pairwise']['C3'][4]+$data['pairwise']['C4'][4]+$data['pairwise']['C5'][4],
            ];
            ////////////////////////////  Batas Pairwise Comparisons    ///////////////////////////

            ///////////////////////////  Pencarian Eigen Vektor Normalisasi    ////////////////////
            $e1 = [
                'a1' => [$data['pairwise']['C1'][0]*$data['pairwise']['C1'][0], $data['pairwise']['C1'][1]*$data['pairwise']['C2'][0], $data['pairwise']['C1'][2]*$data['pairwise']['C3'][0], $data['pairwise']['C1'][3]*$data['pairwise']['C4'][0], $data['pairwise']['C1'][4]*$data['pairwise']['C5'][0]],
                'a2' => [$data['pairwise']['C1'][0]*$data['pairwise']['C1'][1], $data['pairwise']['C1'][1]*$data['pairwise']['C2'][1], $data['pairwise']['C1'][2]*$data['pairwise']['C3'][1], $data['pairwise']['C1'][3]*$data['pairwise']['C4'][1], $data['pairwise']['C1'][4]*$data['pairwise']['C5'][1]],
                'a3' => [$data['pairwise']['C1'][0]*$data['pairwise']['C1'][2], $data['pairwise']['C1'][1]*$data['pairwise']['C2'][2], $data['pairwise']['C1'][2]*$data['pairwise']['C3'][2], $data['pairwise']['C1'][3]*$data['pairwise']['C4'][2], $data['pairwise']['C1'][4]*$data['pairwise']['C5'][2]],
                'a4' => [$data['pairwise']['C1'][0]*$data['pairwise']['C1'][3], $data['pairwise']['C1'][1]*$data['pairwise']['C2'][3], $data['pairwise']['C1'][2]*$data['pairwise']['C3'][3], $data['pairwise']['C1'][3]*$data['pairwise']['C4'][3], $data['pairwise']['C1'][4]*$data['pairwise']['C5'][3]],
                'a5' => [$data['pairwise']['C1'][0]*$data['pairwise']['C1'][4], $data['pairwise']['C1'][1]*$data['pairwise']['C2'][4], $data['pairwise']['C1'][2]*$data['pairwise']['C3'][4], $data['pairwise']['C1'][3]*$data['pairwise']['C4'][4], $data['pairwise']['C1'][4]*$data['pairwise']['C5'][4]],
            ];
            $data['baris-1'] = [
                'C1' => [$e1['a1'][0], $e1['a1'][1], $e1['a1'][2], $e1['a1'][3], $e1['a1'][4]],
                'C2' => [$e1['a2'][0], $e1['a2'][1], $e1['a2'][2], $e1['a2'][3], $e1['a2'][4]],
                'C3' => [$e1['a3'][0], $e1['a3'][1], $e1['a3'][2], $e1['a3'][3], $e1['a3'][4]],
                'C4' => [$e1['a4'][0], $e1['a4'][1], $e1['a4'][2], $e1['a4'][3], $e1['a4'][4]],
                'C5' => [$e1['a5'][0], $e1['a5'][1], $e1['a5'][2], $e1['a5'][3], $e1['a5'][4]],
            ];
    
            $e2 = [
                'a1' => [$data['pairwise']['C2'][0]*$data['pairwise']['C1'][0], $data['pairwise']['C2'][1]*$data['pairwise']['C2'][0], $data['pairwise']['C2'][2]*$data['pairwise']['C3'][0], $data['pairwise']['C2'][3]*$data['pairwise']['C4'][0], $data['pairwise']['C2'][4]*$data['pairwise']['C5'][0]],
                'a2' => [$data['pairwise']['C2'][0]*$data['pairwise']['C1'][1], $data['pairwise']['C2'][1]*$data['pairwise']['C2'][1], $data['pairwise']['C2'][2]*$data['pairwise']['C3'][1], $data['pairwise']['C2'][3]*$data['pairwise']['C4'][1], $data['pairwise']['C2'][4]*$data['pairwise']['C5'][1]],
                'a3' => [$data['pairwise']['C2'][0]*$data['pairwise']['C1'][2], $data['pairwise']['C2'][1]*$data['pairwise']['C2'][2], $data['pairwise']['C2'][2]*$data['pairwise']['C3'][2], $data['pairwise']['C2'][3]*$data['pairwise']['C4'][2], $data['pairwise']['C2'][4]*$data['pairwise']['C5'][2]],
                'a4' => [$data['pairwise']['C2'][0]*$data['pairwise']['C1'][3], $data['pairwise']['C2'][1]*$data['pairwise']['C2'][3], $data['pairwise']['C2'][2]*$data['pairwise']['C3'][3], $data['pairwise']['C2'][3]*$data['pairwise']['C4'][3], $data['pairwise']['C2'][4]*$data['pairwise']['C5'][3]],
                'a5' => [$data['pairwise']['C2'][0]*$data['pairwise']['C1'][4], $data['pairwise']['C2'][1]*$data['pairwise']['C2'][4], $data['pairwise']['C2'][2]*$data['pairwise']['C3'][4], $data['pairwise']['C2'][3]*$data['pairwise']['C4'][4], $data['pairwise']['C2'][4]*$data['pairwise']['C5'][4]],
            ];
            $data['baris-2'] = [
                'C1' => [$e2['a1'][0], $e2['a1'][1], $e2['a1'][2], $e2['a1'][3], $e2['a1'][4]],
                'C2' => [$e2['a2'][0], $e2['a2'][1], $e2['a2'][2], $e2['a2'][3], $e2['a2'][4]],
                'C3' => [$e2['a3'][0], $e2['a3'][1], $e2['a3'][2], $e2['a3'][3], $e2['a3'][4]],
                'C4' => [$e2['a4'][0], $e2['a4'][1], $e2['a4'][2], $e2['a4'][3], $e2['a4'][4]],
                'C5' => [$e2['a5'][0], $e2['a5'][1], $e2['a5'][2], $e2['a5'][3], $e2['a5'][4]],
            ];
    
            $e3 = [
                'a1' => [$data['pairwise']['C3'][0]*$data['pairwise']['C1'][0], $data['pairwise']['C3'][1]*$data['pairwise']['C2'][0], $data['pairwise']['C3'][2]*$data['pairwise']['C3'][0], $data['pairwise']['C3'][3]*$data['pairwise']['C4'][0], $data['pairwise']['C3'][4]*$data['pairwise']['C5'][0]],
                'a2' => [$data['pairwise']['C3'][0]*$data['pairwise']['C1'][1], $data['pairwise']['C3'][1]*$data['pairwise']['C2'][1], $data['pairwise']['C3'][2]*$data['pairwise']['C3'][1], $data['pairwise']['C3'][3]*$data['pairwise']['C4'][1], $data['pairwise']['C3'][4]*$data['pairwise']['C5'][1]],
                'a3' => [$data['pairwise']['C3'][0]*$data['pairwise']['C1'][2], $data['pairwise']['C3'][1]*$data['pairwise']['C2'][2], $data['pairwise']['C3'][2]*$data['pairwise']['C3'][2], $data['pairwise']['C3'][3]*$data['pairwise']['C4'][2], $data['pairwise']['C3'][4]*$data['pairwise']['C5'][2]],
                'a4' => [$data['pairwise']['C3'][0]*$data['pairwise']['C1'][3], $data['pairwise']['C3'][1]*$data['pairwise']['C2'][3], $data['pairwise']['C3'][2]*$data['pairwise']['C3'][3], $data['pairwise']['C3'][3]*$data['pairwise']['C4'][3], $data['pairwise']['C3'][4]*$data['pairwise']['C5'][3]],
                'a5' => [$data['pairwise']['C3'][0]*$data['pairwise']['C1'][4], $data['pairwise']['C3'][1]*$data['pairwise']['C2'][4], $data['pairwise']['C3'][2]*$data['pairwise']['C3'][4], $data['pairwise']['C3'][3]*$data['pairwise']['C4'][4], $data['pairwise']['C3'][4]*$data['pairwise']['C5'][4]],
            ];
            $data['baris-3'] = [
                'C1' => [$e3['a1'][0], $e3['a1'][1], $e3['a1'][2], $e3['a1'][3], $e3['a1'][4]],
                'C2' => [$e3['a2'][0], $e3['a2'][1], $e3['a2'][2], $e3['a2'][3], $e3['a2'][4]],
                'C3' => [$e3['a3'][0], $e3['a3'][1], $e3['a3'][2], $e3['a3'][3], $e3['a3'][4]],
                'C4' => [$e3['a4'][0], $e3['a4'][1], $e3['a4'][2], $e3['a4'][3], $e3['a4'][4]],
                'C5' => [$e3['a5'][0], $e3['a5'][1], $e3['a5'][2], $e3['a5'][3], $e3['a5'][4]],
            ];
            $e4 = [
                'a1' => [$data['pairwise']['C4'][0]*$data['pairwise']['C1'][0], $data['pairwise']['C4'][1]*$data['pairwise']['C2'][0], $data['pairwise']['C4'][2]*$data['pairwise']['C3'][0], $data['pairwise']['C4'][3]*$data['pairwise']['C4'][0], $data['pairwise']['C4'][4]*$data['pairwise']['C5'][0]],
                'a2' => [$data['pairwise']['C4'][0]*$data['pairwise']['C1'][1], $data['pairwise']['C4'][1]*$data['pairwise']['C2'][1], $data['pairwise']['C4'][2]*$data['pairwise']['C3'][1], $data['pairwise']['C4'][3]*$data['pairwise']['C4'][1], $data['pairwise']['C4'][4]*$data['pairwise']['C5'][1]],
                'a3' => [$data['pairwise']['C4'][0]*$data['pairwise']['C1'][2], $data['pairwise']['C4'][1]*$data['pairwise']['C2'][2], $data['pairwise']['C4'][2]*$data['pairwise']['C3'][2], $data['pairwise']['C4'][3]*$data['pairwise']['C4'][2], $data['pairwise']['C4'][4]*$data['pairwise']['C5'][2]],
                'a4' => [$data['pairwise']['C4'][0]*$data['pairwise']['C1'][3], $data['pairwise']['C4'][1]*$data['pairwise']['C2'][3], $data['pairwise']['C4'][2]*$data['pairwise']['C3'][3], $data['pairwise']['C4'][3]*$data['pairwise']['C4'][3], $data['pairwise']['C4'][4]*$data['pairwise']['C5'][3]],
                'a5' => [$data['pairwise']['C4'][0]*$data['pairwise']['C1'][4], $data['pairwise']['C4'][1]*$data['pairwise']['C2'][4], $data['pairwise']['C4'][2]*$data['pairwise']['C3'][4], $data['pairwise']['C4'][3]*$data['pairwise']['C4'][4], $data['pairwise']['C4'][4]*$data['pairwise']['C5'][4]],
            ];
            $data['baris-4'] = [
                'C1' => [$e4['a1'][0], $e4['a1'][1], $e4['a1'][2], $e4['a1'][3], $e4['a1'][4]],
                'C2' => [$e4['a2'][0], $e4['a2'][1], $e4['a2'][2], $e4['a2'][3], $e4['a2'][4]],
                'C3' => [$e4['a3'][0], $e4['a3'][1], $e4['a3'][2], $e4['a3'][3], $e4['a3'][4]],
                'C4' => [$e4['a4'][0], $e4['a4'][1], $e4['a4'][2], $e4['a4'][3], $e4['a4'][4]],
                'C5' => [$e4['a5'][0], $e4['a5'][1], $e4['a5'][2], $e4['a5'][3], $e4['a5'][4]],
            ];

            $e5 = [
                'a1' => [$data['pairwise']['C4'][0]*$data['pairwise']['C1'][0], $data['pairwise']['C4'][1]*$data['pairwise']['C2'][0], $data['pairwise']['C4'][2]*$data['pairwise']['C3'][0], $data['pairwise']['C4'][3]*$data['pairwise']['C4'][0], $data['pairwise']['C4'][4]*$data['pairwise']['C5'][0]],
                'a2' => [$data['pairwise']['C4'][0]*$data['pairwise']['C1'][1], $data['pairwise']['C4'][1]*$data['pairwise']['C2'][1], $data['pairwise']['C4'][2]*$data['pairwise']['C3'][1], $data['pairwise']['C4'][3]*$data['pairwise']['C4'][1], $data['pairwise']['C4'][4]*$data['pairwise']['C5'][1]],
                'a3' => [$data['pairwise']['C4'][0]*$data['pairwise']['C1'][2], $data['pairwise']['C4'][1]*$data['pairwise']['C2'][2], $data['pairwise']['C4'][2]*$data['pairwise']['C3'][2], $data['pairwise']['C4'][3]*$data['pairwise']['C4'][2], $data['pairwise']['C4'][4]*$data['pairwise']['C5'][2]],
                'a4' => [$data['pairwise']['C4'][0]*$data['pairwise']['C1'][3], $data['pairwise']['C4'][1]*$data['pairwise']['C2'][3], $data['pairwise']['C4'][2]*$data['pairwise']['C3'][3], $data['pairwise']['C4'][3]*$data['pairwise']['C4'][3], $data['pairwise']['C4'][4]*$data['pairwise']['C5'][3]],
                'a5' => [$data['pairwise']['C4'][0]*$data['pairwise']['C1'][4], $data['pairwise']['C4'][1]*$data['pairwise']['C2'][4], $data['pairwise']['C4'][2]*$data['pairwise']['C3'][4], $data['pairwise']['C4'][3]*$data['pairwise']['C4'][4], $data['pairwise']['C4'][4]*$data['pairwise']['C5'][4]],
            ];
            $data['baris-5'] = [
                'C1' => [$e5['a1'][0], $e5['a1'][1], $e5['a1'][2], $e5['a1'][3], $e5['a1'][4]],
                'C2' => [$e5['a2'][0], $e5['a2'][1], $e5['a2'][2], $e5['a2'][3], $e5['a2'][4]],
                'C3' => [$e5['a3'][0], $e5['a3'][1], $e5['a3'][2], $e5['a3'][3], $e5['a3'][4]],
                'C4' => [$e5['a4'][0], $e5['a4'][1], $e5['a4'][2], $e5['a4'][3], $e5['a4'][4]],
                'C5' => [$e5['a5'][0], $e5['a5'][1], $e5['a5'][2], $e5['a5'][3], $e5['a5'][4]],
            ];
            /////////////////////    Batas Perncarian Eigen Vektor Normalisasi   ///////////////////

            ////////////////////////    Eigen Vektor Normalisasi   ////////////////////////////////

            $data['evn'] = [
                'C1' => [array_sum($data['baris-1']['C1']), array_sum($data['baris-1']['C2']), array_sum($data['baris-1']['C3']), array_sum($data['baris-1']['C4']), array_sum($data['baris-1']['C5'])],
                'C2' => [array_sum($data['baris-2']['C1']), array_sum($data['baris-2']['C2']), array_sum($data['baris-2']['C3']), array_sum($data['baris-2']['C4']), array_sum($data['baris-2']['C5'])],
                'C3' => [array_sum($data['baris-3']['C1']), array_sum($data['baris-3']['C2']), array_sum($data['baris-3']['C3']), array_sum($data['baris-3']['C4']), array_sum($data['baris-3']['C5'])],
                'C4' => [array_sum($data['baris-4']['C1']), array_sum($data['baris-4']['C2']), array_sum($data['baris-4']['C3']), array_sum($data['baris-4']['C4']), array_sum($data['baris-4']['C5'])],
                'C5' => [array_sum($data['baris-5']['C1']), array_sum($data['baris-5']['C2']), array_sum($data['baris-5']['C3']), array_sum($data['baris-5']['C4']), array_sum($data['baris-5']['C5'])],
            ];
            $sumEvn = (array_sum($data['evn']['C1'])+array_sum($data['evn']['C2'])+array_sum($data['evn']['C3'])+array_sum($data['evn']['C4'])+array_sum($data['evn']['C5']));
            $data['evnTotal'] = [
                'C1'=> [array_sum($data['evn']['C1']), array_sum($data['evn']['C1'])/$sumEvn],
                'C2'=> [array_sum($data['evn']['C2']), array_sum($data['evn']['C2'])/$sumEvn],
                'C3'=> [array_sum($data['evn']['C3']), array_sum($data['evn']['C3'])/$sumEvn],
                'C4'=> [array_sum($data['evn']['C4']), array_sum($data['evn']['C4'])/$sumEvn],
                'C5'=> [array_sum($data['evn']['C5']), array_sum($data['evn']['C5'])/$sumEvn],
            ];
            ///////////////////////  Batas Eigen Vektor Normalisasi  /////////////////////////////

            ////////////////////////    Rasio Konsistensi   ////////////////////////////////
            $data['kolomRasio'] = ['Emaks', 'CI', 'CR'];
            $eMaks = [
                'C1' => $data['pairwise_total']['C1']*$data['evnTotal']['C1'][1],
                'C2' => $data['pairwise_total']['C2']*$data['evnTotal']['C2'][1],
                'C3' => $data['pairwise_total']['C3']*$data['evnTotal']['C3'][1],
                'C4' => $data['pairwise_total']['C4']*$data['evnTotal']['C4'][1],
                'C5' => $data['pairwise_total']['C5']*$data['evnTotal']['C5'][1],
            ];
            $n = KriteriaSub::where('kriteria_id', $request->kriteria_id)->count();

            $randomIndexConsistency = '';
            if($n == 3){
                $randomIndexConsistency = 0.58;
            }elseif($n == 4){
                $randomIndexConsistency = 0.90;
            }elseif($n == 5){
                $randomIndexConsistency = 1.12;
            }elseif($n == 6){
                $randomIndexConsistency = 1.24;
            }elseif($n == 7){
                $randomIndexConsistency = 1.32;
            }elseif($n == 8){
                $randomIndexConsistency = 1.41;
            }
            $data['barisRasio'] = [
                'Emaks' => array_sum($eMaks),
                'CI' => (array_sum($eMaks)-$n)/($n-1),
                'CR' => ((array_sum($eMaks)-$n)/($n-1))/$randomIndexConsistency,
            ];

            ///////////////////////  Batas Rasio Konsistensi  /////////////////////////////

            $c1 = $data['evnTotal']['C1'][1] > $data['evnTotal']['C2'][1] && $data['evnTotal']['C1'][1] > $data['evnTotal']['C3'][1] && $data['evnTotal']['C1'][1] > $data['evnTotal']['C4'][1] && $data['evnTotal']['C1'][1] > $data['evnTotal']['C5'][1];
            $c2 = $data['evnTotal']['C2'][1] > $data['evnTotal']['C1'][1] && $data['evnTotal']['C2'][1] > $data['evnTotal']['C3'][1] && $data['evnTotal']['C2'][1] > $data['evnTotal']['C4'][1] && $data['evnTotal']['C2'][1] > $data['evnTotal']['C5'][1];
            $c3 = $data['evnTotal']['C3'][1] > $data['evnTotal']['C1'][1] && $data['evnTotal']['C3'][1] > $data['evnTotal']['C2'][1] && $data['evnTotal']['C3'][1] > $data['evnTotal']['C4'][1] && $data['evnTotal']['C3'][1] > $data['evnTotal']['C5'][1];
            $c4 = $data['evnTotal']['C4'][1] > $data['evnTotal']['C1'][1] && $data['evnTotal']['C4'][1] > $data['evnTotal']['C2'][1] && $data['evnTotal']['C4'][1] > $data['evnTotal']['C3'][1] && $data['evnTotal']['C4'][1] > $data['evnTotal']['C5'][1];
            $c5 = $data['evnTotal']['C5'][1] > $data['evnTotal']['C1'][1] && $data['evnTotal']['C5'][1] > $data['evnTotal']['C2'][1] && $data['evnTotal']['C5'][1] > $data['evnTotal']['C3'][1] && $data['evnTotal']['C5'][1] > $data['evnTotal']['C4'][1];


            $nilaiTertinggi = '';
            if ($c1) {
                $tipekriteria = KriteriaSub::where('kriteria_id', $request->kriteria_id)->where('nama', 'Kemampuan Mendefinisikan Informasi')->first();
                $nilaiTertinggi = 'Unggul di '.$tipekriteria->nama;
            } elseif ($c2) {
                $tipekriteria = KriteriaSub::where('kriteria_id', $request->kriteria_id)->where('nama', 'Kemampuan Mengakses Informasi')->first();
                $nilaiTertinggi = 'Unggul di '.$tipekriteria->nama;
            } elseif ($c3) {
                $tipekriteria = KriteriaSub::where('kriteria_id', $request->kriteria_id)->where('nama', 'Kemampuan Mengelola Informasi')->first();
                $nilaiTertinggi = 'Unggul di '.$tipekriteria->nama;
            } elseif ($c4){
                $tipekriteria = KriteriaSub::where('kriteria_id', $request->kriteria_id)->where('nama', 'Kemampuan Mengintegrasikan Informasi')->first();
                $nilaiTertinggi = 'Unggul di '.$tipekriteria->nama;
            } elseif ($c5){
                $tipekriteria = KriteriaSub::where('kriteria_id', $request->kriteria_id)->where('nama', 'Kemampuan Mengkomunikasikan Informasi')->first();
                $nilaiTertinggi = 'Unggul di '.$tipekriteria->nama;
            }

            $data['hasil'] = Hasil::create([
                'user_id' => Auth::user()->id,
                'kriteria_id' => $request->kriteria_id,
                'nim' => Auth::user()->nim,
                'kesimpulan' => $nilaiTertinggi,
            ]);
            
            foreach ($data['evnTotal'] as $item => $row) {
                $data['detail'] = Detail::create([
                    'hasil_id' => $data['hasil']->id,
                    'perbandingan_code' => $item,
                    'totalEvn' => round($row[1], 2)
                ]);
            }
        } else {
            $data['skalaValues'] = $data['analisis']->pluck('skala')->values()->all();
            $data['kolomLabels'] = ['C1', 'C2', 'C3', 'C4', 'C5', 'C6'];
            $data['barisLabels'] = ['C1', 'C2', 'C3', 'C4', 'C5', 'C6'];
            /////////////////////////////     Pairwise Comparisons    /////////////////////////////
            $data['pairwise'] = [
                'C1' => [1, $data['skalaValues'][0], $data['skalaValues'][1], $data['skalaValues'][2], $data['skalaValues'][3], $data['skalaValues'][4]],
                'C2' => [round(1/$data['skalaValues'][0], 2), 1, $data['skalaValues'][5], $data['skalaValues'][6], $data['skalaValues'][7], $data['skalaValues'][8]],
                'C3' => [round(1/$data['skalaValues'][1], 2), round(1/$data['skalaValues'][5], 2), 1, $data['skalaValues'][9], $data['skalaValues'][10], $data['skalaValues'][11]],
                'C4' => [round(1/$data['skalaValues'][2], 2), round(1/$data['skalaValues'][6], 2), round(1/$data['skalaValues'][9], 2), 1, $data['skalaValues'][12], $data['skalaValues'][13]],
                'C5' => [round(1/$data['skalaValues'][3], 2), round(1/$data['skalaValues'][7], 2), round(1/$data['skalaValues'][10], 2), round(1/$data['skalaValues'][12], 2), 1, $data['skalaValues'][14]],
                'C6' => [round(1/$data['skalaValues'][4], 2), round(1/$data['skalaValues'][8], 2), round(1/$data['skalaValues'][11], 2), round(1/$data['skalaValues'][13], 2), round(1/$data['skalaValues'][14], 2), 1],
            ];
            $data['pairwise_total'] = [
                'C1' => $data['pairwise']['C1'][0]+$data['pairwise']['C2'][0]+$data['pairwise']['C3'][0]+$data['pairwise']['C4'][0]+$data['pairwise']['C5'][0]+$data['pairwise']['C6'][0],
                'C2' => $data['pairwise']['C1'][1]+$data['pairwise']['C2'][1]+$data['pairwise']['C3'][1]+$data['pairwise']['C4'][1]+$data['pairwise']['C5'][1]+$data['pairwise']['C6'][1],
                'C3' => $data['pairwise']['C1'][2]+$data['pairwise']['C2'][2]+$data['pairwise']['C3'][2]+$data['pairwise']['C4'][2]+$data['pairwise']['C5'][2]+$data['pairwise']['C6'][2],
                'C4' => $data['pairwise']['C1'][3]+$data['pairwise']['C2'][3]+$data['pairwise']['C3'][3]+$data['pairwise']['C4'][3]+$data['pairwise']['C5'][3]+$data['pairwise']['C6'][3],
                'C5' => $data['pairwise']['C1'][4]+$data['pairwise']['C2'][4]+$data['pairwise']['C3'][4]+$data['pairwise']['C4'][4]+$data['pairwise']['C5'][4]+$data['pairwise']['C6'][4],
                'C6' => $data['pairwise']['C1'][5]+$data['pairwise']['C2'][5]+$data['pairwise']['C3'][5]+$data['pairwise']['C4'][5]+$data['pairwise']['C5'][5]+$data['pairwise']['C6'][5],
            ];
            ////////////////////////////  Batas Pairwise Comparisons    ///////////////////////////

            ///////////////////////////  Pencarian Eigen Vektor Normalisasi    ////////////////////
            $e1 = [
                'a1' => [$data['pairwise']['C1'][0]*$data['pairwise']['C1'][0], $data['pairwise']['C1'][1]*$data['pairwise']['C2'][0], $data['pairwise']['C1'][2]*$data['pairwise']['C3'][0], $data['pairwise']['C1'][3]*$data['pairwise']['C4'][0], $data['pairwise']['C1'][4]*$data['pairwise']['C5'][0], $data['pairwise']['C1'][5]*$data['pairwise']['C6'][0]],
                'a2' => [$data['pairwise']['C1'][0]*$data['pairwise']['C1'][1], $data['pairwise']['C1'][1]*$data['pairwise']['C2'][1], $data['pairwise']['C1'][2]*$data['pairwise']['C3'][1], $data['pairwise']['C1'][3]*$data['pairwise']['C4'][1], $data['pairwise']['C1'][4]*$data['pairwise']['C5'][1], $data['pairwise']['C1'][5]*$data['pairwise']['C6'][1]],
                'a3' => [$data['pairwise']['C1'][0]*$data['pairwise']['C1'][2], $data['pairwise']['C1'][1]*$data['pairwise']['C2'][2], $data['pairwise']['C1'][2]*$data['pairwise']['C3'][2], $data['pairwise']['C1'][3]*$data['pairwise']['C4'][2], $data['pairwise']['C1'][4]*$data['pairwise']['C5'][2], $data['pairwise']['C1'][5]*$data['pairwise']['C6'][2]],
                'a4' => [$data['pairwise']['C1'][0]*$data['pairwise']['C1'][3], $data['pairwise']['C1'][1]*$data['pairwise']['C2'][3], $data['pairwise']['C1'][2]*$data['pairwise']['C3'][3], $data['pairwise']['C1'][3]*$data['pairwise']['C4'][3], $data['pairwise']['C1'][4]*$data['pairwise']['C5'][3], $data['pairwise']['C1'][5]*$data['pairwise']['C6'][3]],
                'a5' => [$data['pairwise']['C1'][0]*$data['pairwise']['C1'][4], $data['pairwise']['C1'][1]*$data['pairwise']['C2'][4], $data['pairwise']['C1'][2]*$data['pairwise']['C3'][4], $data['pairwise']['C1'][3]*$data['pairwise']['C4'][4], $data['pairwise']['C1'][4]*$data['pairwise']['C5'][4], $data['pairwise']['C1'][5]*$data['pairwise']['C6'][4]],
                'a6' => [$data['pairwise']['C1'][0]*$data['pairwise']['C1'][5], $data['pairwise']['C1'][1]*$data['pairwise']['C2'][5], $data['pairwise']['C1'][2]*$data['pairwise']['C3'][5], $data['pairwise']['C1'][3]*$data['pairwise']['C4'][5], $data['pairwise']['C1'][4]*$data['pairwise']['C5'][5], $data['pairwise']['C1'][5]*$data['pairwise']['C6'][5]],
            ];
            $data['baris-1'] = [
                'C1' => [$e1['a1'][0], $e1['a1'][1], $e1['a1'][2], $e1['a1'][3], $e1['a1'][4], $e1['a1'][5]],
                'C2' => [$e1['a2'][0], $e1['a2'][1], $e1['a2'][2], $e1['a2'][3], $e1['a2'][4], $e1['a2'][5]],
                'C3' => [$e1['a3'][0], $e1['a3'][1], $e1['a3'][2], $e1['a3'][3], $e1['a3'][4], $e1['a3'][5]],
                'C4' => [$e1['a4'][0], $e1['a4'][1], $e1['a4'][2], $e1['a4'][3], $e1['a4'][4], $e1['a4'][5]],
                'C5' => [$e1['a5'][0], $e1['a5'][1], $e1['a5'][2], $e1['a5'][3], $e1['a5'][4], $e1['a5'][5]],
                'C6' => [$e1['a6'][0], $e1['a6'][1], $e1['a6'][2], $e1['a6'][3], $e1['a6'][4], $e1['a6'][5]],
            ];
    
            $e2 = [
                'a1' => [$data['pairwise']['C2'][0]*$data['pairwise']['C1'][0], $data['pairwise']['C2'][1]*$data['pairwise']['C2'][0], $data['pairwise']['C2'][2]*$data['pairwise']['C3'][0], $data['pairwise']['C2'][3]*$data['pairwise']['C4'][0], $data['pairwise']['C2'][4]*$data['pairwise']['C5'][0], $data['pairwise']['C2'][5]*$data['pairwise']['C6'][0]],
                'a2' => [$data['pairwise']['C2'][0]*$data['pairwise']['C1'][1], $data['pairwise']['C2'][1]*$data['pairwise']['C2'][1], $data['pairwise']['C2'][2]*$data['pairwise']['C3'][1], $data['pairwise']['C2'][3]*$data['pairwise']['C4'][1], $data['pairwise']['C2'][4]*$data['pairwise']['C5'][1], $data['pairwise']['C2'][5]*$data['pairwise']['C6'][1]],
                'a3' => [$data['pairwise']['C2'][0]*$data['pairwise']['C1'][2], $data['pairwise']['C2'][1]*$data['pairwise']['C2'][2], $data['pairwise']['C2'][2]*$data['pairwise']['C3'][2], $data['pairwise']['C2'][3]*$data['pairwise']['C4'][2], $data['pairwise']['C2'][4]*$data['pairwise']['C5'][2], $data['pairwise']['C2'][5]*$data['pairwise']['C6'][2]],
                'a4' => [$data['pairwise']['C2'][0]*$data['pairwise']['C1'][3], $data['pairwise']['C2'][1]*$data['pairwise']['C2'][3], $data['pairwise']['C2'][2]*$data['pairwise']['C3'][3], $data['pairwise']['C2'][3]*$data['pairwise']['C4'][3], $data['pairwise']['C2'][4]*$data['pairwise']['C5'][3], $data['pairwise']['C2'][5]*$data['pairwise']['C6'][3]],
                'a5' => [$data['pairwise']['C2'][0]*$data['pairwise']['C1'][4], $data['pairwise']['C2'][1]*$data['pairwise']['C2'][4], $data['pairwise']['C2'][2]*$data['pairwise']['C3'][4], $data['pairwise']['C2'][3]*$data['pairwise']['C4'][4], $data['pairwise']['C2'][4]*$data['pairwise']['C5'][4], $data['pairwise']['C2'][5]*$data['pairwise']['C6'][4]],
                'a6' => [$data['pairwise']['C2'][0]*$data['pairwise']['C1'][5], $data['pairwise']['C2'][1]*$data['pairwise']['C2'][5], $data['pairwise']['C2'][2]*$data['pairwise']['C3'][5], $data['pairwise']['C2'][3]*$data['pairwise']['C4'][5], $data['pairwise']['C2'][4]*$data['pairwise']['C5'][5], $data['pairwise']['C2'][5]*$data['pairwise']['C6'][5]],
            ];
            $data['baris-2'] = [
                'C1' => [$e2['a1'][0], $e2['a1'][1], $e2['a1'][2], $e2['a1'][3], $e2['a1'][4], $e2['a1'][5]],
                'C2' => [$e2['a2'][0], $e2['a2'][1], $e2['a2'][2], $e2['a2'][3], $e2['a2'][4], $e2['a2'][5]],
                'C3' => [$e2['a3'][0], $e2['a3'][1], $e2['a3'][2], $e2['a3'][3], $e2['a3'][4], $e2['a3'][5]],
                'C4' => [$e2['a4'][0], $e2['a4'][1], $e2['a4'][2], $e2['a4'][3], $e2['a4'][4], $e2['a4'][5]],
                'C5' => [$e2['a5'][0], $e2['a5'][1], $e2['a5'][2], $e2['a5'][3], $e2['a5'][4], $e2['a5'][5]],
                'C6' => [$e2['a6'][0], $e2['a6'][1], $e2['a6'][2], $e2['a6'][3], $e2['a6'][4], $e2['a6'][5]],
            ];
            $e3 = [
                'a1' => [$data['pairwise']['C3'][0]*$data['pairwise']['C1'][0], $data['pairwise']['C3'][1]*$data['pairwise']['C2'][0], $data['pairwise']['C3'][2]*$data['pairwise']['C3'][0], $data['pairwise']['C3'][3]*$data['pairwise']['C4'][0], $data['pairwise']['C3'][4]*$data['pairwise']['C5'][0], $data['pairwise']['C3'][5]*$data['pairwise']['C6'][0]],
                'a2' => [$data['pairwise']['C3'][0]*$data['pairwise']['C1'][1], $data['pairwise']['C3'][1]*$data['pairwise']['C2'][1], $data['pairwise']['C3'][2]*$data['pairwise']['C3'][1], $data['pairwise']['C3'][3]*$data['pairwise']['C4'][1], $data['pairwise']['C3'][4]*$data['pairwise']['C5'][1], $data['pairwise']['C3'][5]*$data['pairwise']['C6'][1]],
                'a3' => [$data['pairwise']['C3'][0]*$data['pairwise']['C1'][2], $data['pairwise']['C3'][1]*$data['pairwise']['C2'][2], $data['pairwise']['C3'][2]*$data['pairwise']['C3'][2], $data['pairwise']['C3'][3]*$data['pairwise']['C4'][2], $data['pairwise']['C3'][4]*$data['pairwise']['C5'][2], $data['pairwise']['C3'][5]*$data['pairwise']['C6'][2]],
                'a4' => [$data['pairwise']['C3'][0]*$data['pairwise']['C1'][3], $data['pairwise']['C3'][1]*$data['pairwise']['C2'][3], $data['pairwise']['C3'][2]*$data['pairwise']['C3'][3], $data['pairwise']['C3'][3]*$data['pairwise']['C4'][3], $data['pairwise']['C3'][4]*$data['pairwise']['C5'][3], $data['pairwise']['C3'][5]*$data['pairwise']['C6'][3]],
                'a5' => [$data['pairwise']['C3'][0]*$data['pairwise']['C1'][4], $data['pairwise']['C3'][1]*$data['pairwise']['C2'][4], $data['pairwise']['C3'][2]*$data['pairwise']['C3'][4], $data['pairwise']['C3'][3]*$data['pairwise']['C4'][4], $data['pairwise']['C3'][4]*$data['pairwise']['C5'][4], $data['pairwise']['C3'][5]*$data['pairwise']['C6'][4]],
                'a6' => [$data['pairwise']['C3'][0]*$data['pairwise']['C1'][5], $data['pairwise']['C3'][1]*$data['pairwise']['C2'][5], $data['pairwise']['C3'][2]*$data['pairwise']['C3'][5], $data['pairwise']['C3'][3]*$data['pairwise']['C4'][5], $data['pairwise']['C3'][4]*$data['pairwise']['C5'][5], $data['pairwise']['C3'][5]*$data['pairwise']['C6'][5]],
            ];
            $data['baris-3'] = [
                'C1' => [$e3['a1'][0], $e3['a1'][1], $e3['a1'][2], $e3['a1'][3], $e3['a1'][4], $e3['a1'][5]],
                'C2' => [$e3['a2'][0], $e3['a2'][1], $e3['a2'][2], $e3['a2'][3], $e3['a2'][4], $e3['a2'][5]],
                'C3' => [$e3['a3'][0], $e3['a3'][1], $e3['a3'][2], $e3['a3'][3], $e3['a3'][4], $e3['a3'][5]],
                'C4' => [$e3['a4'][0], $e3['a4'][1], $e3['a4'][2], $e3['a4'][3], $e3['a4'][4], $e3['a4'][5]],
                'C5' => [$e3['a5'][0], $e3['a5'][1], $e3['a5'][2], $e3['a5'][3], $e3['a5'][4], $e3['a5'][5]],
                'C6' => [$e3['a6'][0], $e3['a6'][1], $e3['a6'][2], $e3['a6'][3], $e3['a6'][4], $e3['a6'][5]],
            ];
            $e4 = [
                'a1' => [$data['pairwise']['C4'][0]*$data['pairwise']['C1'][0], $data['pairwise']['C4'][1]*$data['pairwise']['C2'][0], $data['pairwise']['C4'][2]*$data['pairwise']['C3'][0], $data['pairwise']['C4'][3]*$data['pairwise']['C4'][0], $data['pairwise']['C4'][4]*$data['pairwise']['C5'][0], $data['pairwise']['C4'][5]*$data['pairwise']['C6'][0]],
                'a2' => [$data['pairwise']['C4'][0]*$data['pairwise']['C1'][1], $data['pairwise']['C4'][1]*$data['pairwise']['C2'][1], $data['pairwise']['C4'][2]*$data['pairwise']['C3'][1], $data['pairwise']['C4'][3]*$data['pairwise']['C4'][1], $data['pairwise']['C4'][4]*$data['pairwise']['C5'][1], $data['pairwise']['C4'][5]*$data['pairwise']['C6'][1]],
                'a3' => [$data['pairwise']['C4'][0]*$data['pairwise']['C1'][2], $data['pairwise']['C4'][1]*$data['pairwise']['C2'][2], $data['pairwise']['C4'][2]*$data['pairwise']['C3'][2], $data['pairwise']['C4'][3]*$data['pairwise']['C4'][2], $data['pairwise']['C4'][4]*$data['pairwise']['C5'][2], $data['pairwise']['C4'][5]*$data['pairwise']['C6'][2]],
                'a4' => [$data['pairwise']['C4'][0]*$data['pairwise']['C1'][3], $data['pairwise']['C4'][1]*$data['pairwise']['C2'][3], $data['pairwise']['C4'][2]*$data['pairwise']['C3'][3], $data['pairwise']['C4'][3]*$data['pairwise']['C4'][3], $data['pairwise']['C4'][4]*$data['pairwise']['C5'][3], $data['pairwise']['C4'][5]*$data['pairwise']['C6'][3]],
                'a5' => [$data['pairwise']['C4'][0]*$data['pairwise']['C1'][4], $data['pairwise']['C4'][1]*$data['pairwise']['C2'][4], $data['pairwise']['C4'][2]*$data['pairwise']['C3'][4], $data['pairwise']['C4'][3]*$data['pairwise']['C4'][4], $data['pairwise']['C4'][4]*$data['pairwise']['C5'][4], $data['pairwise']['C4'][5]*$data['pairwise']['C6'][4]],
                'a6' => [$data['pairwise']['C4'][0]*$data['pairwise']['C1'][5], $data['pairwise']['C4'][1]*$data['pairwise']['C2'][5], $data['pairwise']['C4'][2]*$data['pairwise']['C3'][5], $data['pairwise']['C4'][3]*$data['pairwise']['C4'][5], $data['pairwise']['C4'][4]*$data['pairwise']['C5'][5], $data['pairwise']['C4'][5]*$data['pairwise']['C6'][5]],
            ];
            $data['baris-4'] = [
                'C1' => [$e4['a1'][0], $e4['a1'][1], $e4['a1'][2], $e4['a1'][3], $e4['a1'][4], $e4['a1'][5]],
                'C2' => [$e4['a2'][0], $e4['a2'][1], $e4['a2'][2], $e4['a2'][3], $e4['a2'][4], $e4['a2'][5]],
                'C3' => [$e4['a3'][0], $e4['a3'][1], $e4['a3'][2], $e4['a3'][3], $e4['a3'][4], $e4['a3'][5]],
                'C4' => [$e4['a4'][0], $e4['a4'][1], $e4['a4'][2], $e4['a4'][3], $e4['a4'][4], $e4['a4'][5]],
                'C5' => [$e4['a5'][0], $e4['a5'][1], $e4['a5'][2], $e4['a5'][3], $e4['a5'][4], $e4['a5'][5]],
                'C6' => [$e4['a6'][0], $e4['a6'][1], $e4['a6'][2], $e4['a6'][3], $e4['a6'][4], $e4['a6'][5]],
            ];

            $e5 = [
                'a1' => [$data['pairwise']['C5'][0]*$data['pairwise']['C1'][0], $data['pairwise']['C5'][1]*$data['pairwise']['C2'][0], $data['pairwise']['C5'][2]*$data['pairwise']['C3'][0], $data['pairwise']['C5'][3]*$data['pairwise']['C4'][0], $data['pairwise']['C5'][3]*$data['pairwise']['C5'][0], $data['pairwise']['C5'][5]*$data['pairwise']['C6'][0]],
                'a2' => [$data['pairwise']['C5'][0]*$data['pairwise']['C1'][1], $data['pairwise']['C5'][1]*$data['pairwise']['C2'][1], $data['pairwise']['C5'][2]*$data['pairwise']['C3'][1], $data['pairwise']['C5'][3]*$data['pairwise']['C4'][1], $data['pairwise']['C5'][3]*$data['pairwise']['C5'][1], $data['pairwise']['C5'][5]*$data['pairwise']['C6'][1]],
                'a3' => [$data['pairwise']['C5'][0]*$data['pairwise']['C1'][2], $data['pairwise']['C5'][1]*$data['pairwise']['C2'][2], $data['pairwise']['C5'][2]*$data['pairwise']['C3'][2], $data['pairwise']['C5'][3]*$data['pairwise']['C4'][2], $data['pairwise']['C5'][3]*$data['pairwise']['C5'][2], $data['pairwise']['C5'][5]*$data['pairwise']['C6'][2]],
                'a4' => [$data['pairwise']['C5'][0]*$data['pairwise']['C1'][3], $data['pairwise']['C5'][1]*$data['pairwise']['C2'][3], $data['pairwise']['C5'][2]*$data['pairwise']['C3'][3], $data['pairwise']['C5'][3]*$data['pairwise']['C4'][3], $data['pairwise']['C5'][3]*$data['pairwise']['C5'][3], $data['pairwise']['C5'][5]*$data['pairwise']['C6'][3]],
                'a5' => [$data['pairwise']['C5'][0]*$data['pairwise']['C1'][4], $data['pairwise']['C5'][1]*$data['pairwise']['C2'][4], $data['pairwise']['C5'][2]*$data['pairwise']['C3'][4], $data['pairwise']['C5'][3]*$data['pairwise']['C4'][4], $data['pairwise']['C5'][3]*$data['pairwise']['C5'][4], $data['pairwise']['C5'][5]*$data['pairwise']['C6'][4]],
                'a6' => [$data['pairwise']['C5'][0]*$data['pairwise']['C1'][5], $data['pairwise']['C5'][1]*$data['pairwise']['C2'][5], $data['pairwise']['C5'][2]*$data['pairwise']['C3'][5], $data['pairwise']['C5'][3]*$data['pairwise']['C4'][5], $data['pairwise']['C5'][3]*$data['pairwise']['C5'][5], $data['pairwise']['C5'][5]*$data['pairwise']['C6'][5]],
            ];
            $data['baris-5'] = [
                'C1' => [$e5['a1'][0], $e5['a1'][1], $e5['a1'][2], $e5['a1'][3], $e5['a1'][4], $e5['a1'][5]],
                'C2' => [$e5['a2'][0], $e5['a2'][1], $e5['a2'][2], $e5['a2'][3], $e5['a2'][4], $e5['a2'][5]],
                'C3' => [$e5['a3'][0], $e5['a3'][1], $e5['a3'][2], $e5['a3'][3], $e5['a3'][4], $e5['a3'][5]],
                'C4' => [$e5['a4'][0], $e5['a4'][1], $e5['a4'][2], $e5['a4'][3], $e5['a4'][4], $e5['a4'][5]],
                'C5' => [$e5['a5'][0], $e5['a5'][1], $e5['a5'][2], $e5['a5'][3], $e5['a5'][4], $e5['a5'][5]],
                'C6' => [$e5['a6'][0], $e5['a6'][1], $e5['a6'][2], $e5['a6'][3], $e5['a6'][4], $e5['a6'][5]],
            ];

            $e6 = [
                'a1' => [$data['pairwise']['C6'][0]*$data['pairwise']['C1'][0], $data['pairwise']['C6'][1]*$data['pairwise']['C2'][0], $data['pairwise']['C6'][2]*$data['pairwise']['C3'][0], $data['pairwise']['C6'][3]*$data['pairwise']['C4'][0], $data['pairwise']['C6'][3]*$data['pairwise']['C5'][0], $data['pairwise']['C6'][5]*$data['pairwise']['C6'][0]],
                'a2' => [$data['pairwise']['C6'][0]*$data['pairwise']['C1'][1], $data['pairwise']['C6'][1]*$data['pairwise']['C2'][1], $data['pairwise']['C6'][2]*$data['pairwise']['C3'][1], $data['pairwise']['C6'][3]*$data['pairwise']['C4'][1], $data['pairwise']['C6'][3]*$data['pairwise']['C5'][1], $data['pairwise']['C6'][5]*$data['pairwise']['C6'][1]],
                'a3' => [$data['pairwise']['C6'][0]*$data['pairwise']['C1'][2], $data['pairwise']['C6'][1]*$data['pairwise']['C2'][2], $data['pairwise']['C6'][2]*$data['pairwise']['C3'][2], $data['pairwise']['C6'][3]*$data['pairwise']['C4'][2], $data['pairwise']['C6'][3]*$data['pairwise']['C5'][2], $data['pairwise']['C6'][5]*$data['pairwise']['C6'][2]],
                'a4' => [$data['pairwise']['C6'][0]*$data['pairwise']['C1'][3], $data['pairwise']['C6'][1]*$data['pairwise']['C2'][3], $data['pairwise']['C6'][2]*$data['pairwise']['C3'][3], $data['pairwise']['C6'][3]*$data['pairwise']['C4'][3], $data['pairwise']['C6'][3]*$data['pairwise']['C5'][3], $data['pairwise']['C6'][5]*$data['pairwise']['C6'][3]],
                'a5' => [$data['pairwise']['C6'][0]*$data['pairwise']['C1'][4], $data['pairwise']['C6'][1]*$data['pairwise']['C2'][4], $data['pairwise']['C6'][2]*$data['pairwise']['C3'][4], $data['pairwise']['C6'][3]*$data['pairwise']['C4'][4], $data['pairwise']['C6'][3]*$data['pairwise']['C5'][4], $data['pairwise']['C6'][5]*$data['pairwise']['C6'][4]],
                'a6' => [$data['pairwise']['C6'][0]*$data['pairwise']['C1'][5], $data['pairwise']['C6'][1]*$data['pairwise']['C2'][5], $data['pairwise']['C6'][2]*$data['pairwise']['C3'][5], $data['pairwise']['C6'][3]*$data['pairwise']['C4'][5], $data['pairwise']['C6'][3]*$data['pairwise']['C5'][5], $data['pairwise']['C6'][5]*$data['pairwise']['C6'][5]],
            ];
            $data['baris-6'] = [
                'C1' => [$e6['a1'][0], $e6['a1'][1], $e6['a1'][2], $e6['a1'][3], $e6['a1'][4], $e6['a1'][5]],
                'C2' => [$e6['a2'][0], $e6['a2'][1], $e6['a2'][2], $e6['a2'][3], $e6['a2'][4], $e6['a2'][5]],
                'C3' => [$e6['a3'][0], $e6['a3'][1], $e6['a3'][2], $e6['a3'][3], $e6['a3'][4], $e6['a3'][5]],
                'C4' => [$e6['a4'][0], $e6['a4'][1], $e6['a4'][2], $e6['a4'][3], $e6['a4'][4], $e6['a4'][5]],
                'C5' => [$e6['a5'][0], $e6['a5'][1], $e6['a5'][2], $e6['a5'][3], $e6['a5'][4], $e6['a5'][5]],
                'C6' => [$e6['a6'][0], $e6['a6'][1], $e6['a6'][2], $e6['a6'][3], $e6['a6'][4], $e6['a6'][5]],
            ];
            /////////////////////    Batas Perncarian Eigen Vektor Normalisasi   ///////////////////

            ////////////////////////    Eigen Vektor Normalisasi   ////////////////////////////////

            $data['evn'] = [
                'C1' => [array_sum($data['baris-1']['C1']), array_sum($data['baris-1']['C2']), array_sum($data['baris-1']['C3']), array_sum($data['baris-1']['C4']), array_sum($data['baris-1']['C5']), array_sum($data['baris-1']['C6'])],
                'C2' => [array_sum($data['baris-2']['C1']), array_sum($data['baris-2']['C2']), array_sum($data['baris-2']['C3']), array_sum($data['baris-2']['C4']), array_sum($data['baris-2']['C5']), array_sum($data['baris-2']['C6'])],
                'C3' => [array_sum($data['baris-3']['C1']), array_sum($data['baris-3']['C2']), array_sum($data['baris-3']['C3']), array_sum($data['baris-3']['C4']), array_sum($data['baris-3']['C5']), array_sum($data['baris-3']['C6'])],
                'C4' => [array_sum($data['baris-4']['C1']), array_sum($data['baris-4']['C2']), array_sum($data['baris-4']['C3']), array_sum($data['baris-4']['C4']), array_sum($data['baris-4']['C5']), array_sum($data['baris-4']['C6'])],
                'C5' => [array_sum($data['baris-5']['C1']), array_sum($data['baris-5']['C2']), array_sum($data['baris-5']['C3']), array_sum($data['baris-5']['C4']), array_sum($data['baris-5']['C5']), array_sum($data['baris-5']['C6'])],
                'C6' => [array_sum($data['baris-6']['C1']), array_sum($data['baris-6']['C2']), array_sum($data['baris-6']['C3']), array_sum($data['baris-6']['C4']), array_sum($data['baris-6']['C5']), array_sum($data['baris-6']['C6'])],
            ];
            $sumEvn = (array_sum($data['evn']['C1'])+array_sum($data['evn']['C2'])+array_sum($data['evn']['C3'])+array_sum($data['evn']['C4'])+array_sum($data['evn']['C5'])+array_sum($data['evn']['C6']));
            $data['evnTotal'] = [
                'C1'=> [array_sum($data['evn']['C1']), array_sum($data['evn']['C1'])/$sumEvn],
                'C2'=> [array_sum($data['evn']['C2']), array_sum($data['evn']['C2'])/$sumEvn],
                'C3'=> [array_sum($data['evn']['C3']), array_sum($data['evn']['C3'])/$sumEvn],
                'C4'=> [array_sum($data['evn']['C4']), array_sum($data['evn']['C4'])/$sumEvn],
                'C5'=> [array_sum($data['evn']['C5']), array_sum($data['evn']['C5'])/$sumEvn],
                'C6'=> [array_sum($data['evn']['C6']), array_sum($data['evn']['C6'])/$sumEvn],
            ];
            ///////////////////////  Batas Eigen Vektor Normalisasi  /////////////////////////////

            ////////////////////////    Rasio Konsistensi   ////////////////////////////////
            $data['kolomRasio'] = ['Emaks', 'CI', 'CR'];
            $eMaks = [
                'C1' => $data['pairwise_total']['C1']*$data['evnTotal']['C1'][1],
                'C2' => $data['pairwise_total']['C2']*$data['evnTotal']['C2'][1],
                'C3' => $data['pairwise_total']['C3']*$data['evnTotal']['C3'][1],
                'C4' => $data['pairwise_total']['C4']*$data['evnTotal']['C4'][1],
                'C5' => $data['pairwise_total']['C5']*$data['evnTotal']['C5'][1],
                'C6' => $data['pairwise_total']['C6']*$data['evnTotal']['C6'][1],
            ];
            $n = KriteriaSub::where('kriteria_id', $request->kriteria_id)->count();

            $randomIndexConsistency = '';
            if($n == 3){
                $randomIndexConsistency = 0.58;
            }elseif($n == 4){
                $randomIndexConsistency = 0.90;
            }elseif($n == 5){
                $randomIndexConsistency = 1.12;
            }elseif($n == 6){
                $randomIndexConsistency = 1.24;
            }elseif($n == 7){
                $randomIndexConsistency = 1.32;
            }elseif($n == 8){
                $randomIndexConsistency = 1.41;
            }
            $data['barisRasio'] = [
                'Emaks' => array_sum($eMaks),
                'CI' => (array_sum($eMaks)-$n)/($n-1),
                'CR' => ((array_sum($eMaks)-$n)/($n-1))/$randomIndexConsistency,
            ];

            ///////////////////////  Batas Rasio Konsistensi  /////////////////////////////

            $c1 = $data['evnTotal']['C1'][1] > $data['evnTotal']['C2'][1] && $data['evnTotal']['C1'][1] > $data['evnTotal']['C3'][1] && $data['evnTotal']['C1'][1] > $data['evnTotal']['C4'][1] && $data['evnTotal']['C1'][1] > $data['evnTotal']['C5'][1] && $data['evnTotal']['C1'][1] > $data['evnTotal']['C6'][1];
            $c2 = $data['evnTotal']['C2'][1] > $data['evnTotal']['C1'][1] && $data['evnTotal']['C2'][1] > $data['evnTotal']['C3'][1] && $data['evnTotal']['C2'][1] > $data['evnTotal']['C4'][1] && $data['evnTotal']['C2'][1] > $data['evnTotal']['C5'][1] && $data['evnTotal']['C2'][1] > $data['evnTotal']['C6'][1];
            $c3 = $data['evnTotal']['C3'][1] > $data['evnTotal']['C1'][1] && $data['evnTotal']['C3'][1] > $data['evnTotal']['C2'][1] && $data['evnTotal']['C3'][1] > $data['evnTotal']['C4'][1] && $data['evnTotal']['C3'][1] > $data['evnTotal']['C5'][1] && $data['evnTotal']['C3'][1] > $data['evnTotal']['C6'][1];
            $c4 = $data['evnTotal']['C4'][1] > $data['evnTotal']['C1'][1] && $data['evnTotal']['C4'][1] > $data['evnTotal']['C2'][1] && $data['evnTotal']['C4'][1] > $data['evnTotal']['C3'][1] && $data['evnTotal']['C4'][1] > $data['evnTotal']['C5'][1] && $data['evnTotal']['C4'][1] > $data['evnTotal']['C6'][1];
            $c5 = $data['evnTotal']['C5'][1] > $data['evnTotal']['C1'][1] && $data['evnTotal']['C5'][1] > $data['evnTotal']['C2'][1] && $data['evnTotal']['C5'][1] > $data['evnTotal']['C3'][1] && $data['evnTotal']['C5'][1] > $data['evnTotal']['C4'][1] && $data['evnTotal']['C5'][1] > $data['evnTotal']['C6'][1];
            $c6 = $data['evnTotal']['C6'][1] > $data['evnTotal']['C1'][1] && $data['evnTotal']['C6'][1] > $data['evnTotal']['C2'][1] && $data['evnTotal']['C6'][1] > $data['evnTotal']['C3'][1] && $data['evnTotal']['C6'][1] > $data['evnTotal']['C4'][1] && $data['evnTotal']['C6'][1] > $data['evnTotal']['C5'][1];


            $nilaiTertinggi = '';
            if ($c1) {
                $tipekriteria = KriteriaSub::where('kriteria_id', $request->kriteria_id)->where('nama', 'Kemampuan Belajar dan Adaptasi')->first();
                $nilaiTertinggi = 'Unggul di '.$tipekriteria->nama;
            } elseif ($c2) {
                $tipekriteria = KriteriaSub::where('kriteria_id', $request->kriteria_id)->where('nama', 'Kemampuan Berkomunikasi')->first();
                $nilaiTertinggi = 'Unggul di '.$tipekriteria->nama;
            } elseif ($c3) {
                $tipekriteria = KriteriaSub::where('kriteria_id', $request->kriteria_id)->where('nama', 'Kemampuan Pemecahan Masalah')->first();
                $nilaiTertinggi = 'Unggul di '.$tipekriteria->nama;
            } elseif ($c4){
                $tipekriteria = KriteriaSub::where('kriteria_id', $request->kriteria_id)->where('nama', 'Keterampilan Teknologi')->first();
                $nilaiTertinggi = 'Unggul di '.$tipekriteria->nama;
            } elseif ($c5){
                $tipekriteria = KriteriaSub::where('kriteria_id', $request->kriteria_id)->where('nama', 'Keterampilan Berpikir Kreatif')->first();
                $nilaiTertinggi = 'Unggul di '.$tipekriteria->nama;
            } elseif ($c6){
                $tipekriteria = KriteriaSub::where('kriteria_id', $request->kriteria_id)->where('nama', 'Kemampuan bekerja dalam tim')->first();
                $nilaiTertinggi = 'Unggul di '.$tipekriteria->nama;
            }

            $data['hasil'] = Hasil::create([
                'user_id' => Auth::user()->id,
                'kriteria_id' => $request->kriteria_id,
                'nim' => Auth::user()->nim,
                'kesimpulan' => $nilaiTertinggi,
            ]);
            
            foreach ($data['evnTotal'] as $item => $row) {
                $data['detail'] = Detail::create([
                    'hasil_id' => $data['hasil']->id,
                    'perbandingan_code' => $item,
                    'totalEvn' => round($row[1], 2)
                ]);
            }
        }
        
        return redirect(route('isi-kuesioner.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $title = 'Kuesioner';
        $data['kriteria'] = Kriteria::find(Crypt::decryptString($id));
        // $data['pertanyaan'] = Pertanyaan::orderBy('tipe_kriteria')->get()->groupBy('perbandingan_kriteria_sub');
        $data['pertanyaan'] = Pertanyaan::where('kriteria_id', Crypt::decryptString($id))->get();
        // dd($data['pertanyaan']);
        return view('apps.kuesioner.show', compact('title', 'data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
