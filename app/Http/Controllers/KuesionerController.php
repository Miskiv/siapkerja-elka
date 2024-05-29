<?php

namespace App\Http\Controllers;

use App\Models\Analisis;
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
        // foreach ($request->jawaban as $perbandingan => $jawabanFase) {
        //     foreach ($jawabanFase as $pertanyaan_id => $jawaban) {
        //         // Menghitung sum jawaban
        //         Jawaban::create([
        //             'user_id' => Auth::user()->id, // Sesuaikan dengan model dan kolom yang sesuai
        //             'kriteria_id' => $request->kriteria_id,
        //             'pertanyaan_id' => $pertanyaan_id,
        //             'perbandingan_code' => $perbandingan,
        //             'jawaban' => $jawaban,
        //         ]);
        //     }
        // }
        // $jawaban = Jawaban::where('user_id', Auth::user()->id)->where('kriteria_id', $request->kriteria_id)->groupBy('perbandingan_code')->selectRaw('*, sum(jawaban) as skor')->get();
        // foreach($jawaban as $row){
        //      // Mapping skala
        //     $skalaMapping = [
        //         0 => 0.14,
        //         1 => 1,
        //         2 => 3,
        //         3 => 5,
        //         4 => 7,
        //     ];

        //     // Mendapatkan skala berdasarkan skor
        //     $skala = $skalaMapping[$row->skor];

        //     // Membuat record di tabel Analisis
        //     Analisis::create([
        //         'kriteria_id' => $row->kriteria_id,
        //         'perbandingan_code' => $row->perbandingan_code,
        //         'user_id' => $row->user_id,
        //         'skala' => $skala,
        //     ]);
        // }
        $data['analisis'] = Analisis::with('User')->where('user_id', Auth::user()->id)->where('kriteria_id', $request->kriteria_id  )->get();
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

            $data['detail-analisis'] = Hasil::create([
                'user_id' => Auth::user()->id,
                'kriteria_id' => $request->kriteria_id,
                'nim' => Auth::user()->nim,
                'kesimpulan' => $nilaiTertinggi,
            ]);
        }elseif ($request->kriteria_id == 2){
            $data['skalaValues'] = $data['analisis']->pluck('skala')->values()->all();
            $data['kolomLabels'] = ['C1', 'C2', 'C3', 'C4', 'C5'];
            $data['barisLabels'] = ['C1', 'C2', 'C3', 'C4', 'C5'];
            /////////////////////////////     Pairwise Comparisons    /////////////////////////////
            $data['pairwise'] = [
                'C1' => [1, $data['skalaValues'][0], $data['skalaValues'][1], $data['skalaValues'][2], $data['skalaValues'][3]],
                'C2' => [round(1/$data['skalaValues'][0], 2), 1, $data['skalaValues'][3], $data['skalaValues'][4], $data['skalaValues'][5]],
                'C3' => [round(1/$data['skalaValues'][1], 2), round(1/$data['skalaValues'][3], 2), 1, $data['skalaValues'][6], $data['skalaValues'][7]],
                'C4' => [round(1/$data['skalaValues'][2], 2), round(1/$data['skalaValues'][4], 2), round(1/$data['skalaValues'][5], 2), 1],
            ];
            dd($data['skalaValues'], $data['pairwise']);
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
            // dd($data);
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

            $data['detail-analisis'] = Hasil::create([
                'user_id' => Auth::user()->id,
                'kriteria_id' => $request->kriteria_id,
                'nim' => Auth::user()->nim,
                'kesimpulan' => $nilaiTertinggi,
            ]);
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
