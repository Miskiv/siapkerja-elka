<?php

namespace App\Http\Controllers;

use App\Models\Analisis;
use App\Models\Jawaban;
use App\Models\TipeKriteria;
use App\Models\User;
use Illuminate\Http\Request;

class AnalisisMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Analisis Mahasiswa';
        $data['analisis'] = Analisis::groupBy('id_user')->get();

        return view('apps.analisis-mahasiswa.index',compact('data', 'title'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['analisis'] = Analisis::with('User')->find($id);
        $title = 'Analisis Mahasiswa';
        $data['skalaValues'] = $data['analisis']->pluck('skala')->unique()->values()->all();
        $data['kolomLabels'] = ['C1', 'C2', 'C3'];
        $data['barisLabels'] = ['C1', 'C2', 'C3'];
        /////////////////////////////     Pairwise Comparisons    /////////////////////////////
        $data['pairwise'] = [
            'C1' => [1, $data['skalaValues'][0], $data['skalaValues'][1]],
            'C2' => [round(1/$data['skalaValues'][0], 2), 1, $data['skalaValues'][2]],
            'C3' => [1/$data['skalaValues'][1], round(1/$data['skalaValues'][2], 2), 1],
        ];
        $data['pairwise_total'] = [
            'C1' => $data['pairwise']['C1'][0]+$data['pairwise']['C2'][0]+$data['pairwise']['C3'][0],
            'C2' => $data['pairwise']['C1'][1]+$data['pairwise']['C2'][1]+$data['pairwise']['C3'][1],
            'C3' => $data['pairwise']['C1'][2]+$data['pairwise']['C2'][2]+$data['pairwise']['C3'][2]
        ];
        ////////////////////////////  Batas Pairwise Comparisons    ///////////////////////////

        ///////////////////////////  Pencarian Eigen Vektor Normalisasi    ////////////////////
        $e1 = [
            'a1' => [$data['pairwise']['C1'][0]*$data['pairwise']['C1'][0], $data['pairwise']['C2'][0]*$data['pairwise']['C1'][1], $data['pairwise']['C3'][0]*$data['pairwise']['C1'][2]],
            'a2' => [$data['pairwise']['C1'][0]*$data['pairwise']['C1'][1], $data['pairwise']['C1'][1]*$data['pairwise']['C2'][1], $data['pairwise']['C3'][1]*$data['pairwise']['C1'][2]],
            'a3' => [$data['pairwise']['C1'][0]*$data['pairwise']['C1'][2], $data['pairwise']['C1'][1]*$data['pairwise']['C2'][2], $data['pairwise']['C1'][2]*$data['pairwise']['C3'][2]],
        ];
        $data['baris-1'] = [
            'C1' => [$e1['a1'][0], $e1['a1'][1], $e1['a1'][2]],
            'C2' => [$e1['a2'][0], $e1['a2'][1], $e1['a2'][2]],
            'C3' => [$e1['a3'][0], $e1['a3'][1], $e1['a3'][2]],
        ];

        $e2 = [
            'a1' => [$data['pairwise']['C2'][0]*$data['pairwise']['C1'][0], $data['pairwise']['C2'][1]*$data['pairwise']['C2'][0], $data['pairwise']['C2'][2]*$data['pairwise']['C3'][0]],
            'a2' => [$data['pairwise']['C2'][0]*$data['pairwise']['C1'][1], $data['pairwise']['C2'][1]*$data['pairwise']['C2'][1], $data['pairwise']['C2'][2]*$data['pairwise']['C3'][2]],
            'a3' => [$data['pairwise']['C2'][0]*$data['pairwise']['C1'][2], $data['pairwise']['C2'][1]*$data['pairwise']['C2'][2], $data['pairwise']['C2'][2]*$data['pairwise']['C3'][2]],
        ];
        $data['baris-2'] = [
            'C1' => [$e2['a1'][0], $e2['a1'][1], $e2['a1'][2]],
            'C2' => [$e2['a2'][0], $e2['a2'][1], $e2['a2'][2]],
            'C3' => [$e2['a3'][0], $e2['a3'][1], $e2['a3'][2]],
        ];

        $e3 = [
            'a1' => [$data['pairwise']['C3'][0]*$data['pairwise']['C1'][0], $data['pairwise']['C3'][1]*$data['pairwise']['C2'][0], $data['pairwise']['C3'][2]*$data['pairwise']['C3'][0]],
            'a2' => [$data['pairwise']['C3'][0]*$data['pairwise']['C1'][1], $data['pairwise']['C3'][1]*$data['pairwise']['C2'][1], $data['pairwise']['C3'][1]*$data['pairwise']['C3'][2]],
            'a3' => [$data['pairwise']['C3'][0]*$data['pairwise']['C1'][2], $data['pairwise']['C3'][1]*$data['pairwise']['C2'][2], $data['pairwise']['C3'][2]*$data['pairwise']['C3'][2]],
        ];
        $data['baris-3'] = [
            'C1' => [$e3['a1'][0], $e3['a1'][1], $e3['a1'][2]],
            'C2' => [$e3['a2'][0], $e3['a2'][1], $e3['a2'][2]],
            'C3' => [$e3['a3'][0], $e3['a3'][1], $e3['a3'][2]],
        ];
        /////////////////////    Batas Perncarian Eigen Vektor Normalisasi   ///////////////////

        ////////////////////////    Eigen Vektor Normalisasi   ////////////////////////////////

        $data['evn'] = [
            'C1' => [array_sum($data['baris-1']['C1']), array_sum($data['baris-1']['C2']), array_sum($data['baris-1']['C3'])],
            'C2' => [array_sum($data['baris-2']['C1']), array_sum($data['baris-2']['C2']), array_sum($data['baris-2']['C3'])],
            'C3' => [array_sum($data['baris-3']['C1']), array_sum($data['baris-3']['C2']), array_sum($data['baris-3']['C3'])],
        ];
        $sumEvn = (array_sum($data['evn']['C1'])+array_sum($data['evn']['C2'])+array_sum($data['evn']['C3']));

        $data['evnTotal'] = [
            'C1'=> [array_sum($data['evn']['C1']), array_sum($data['evn']['C1'])/$sumEvn],
            'C2'=> [array_sum($data['evn']['C2']), array_sum($data['evn']['C2'])/$sumEvn],
            'C3'=> [array_sum($data['evn']['C3']), array_sum($data['evn']['C3'])/$sumEvn],
        ];

        ///////////////////////  Batas Eigen Vektor Normalisasi  /////////////////////////////

        ////////////////////////    Rasio Konsistensi   ////////////////////////////////

        $data['kolomRasio'] = ['Emaks', 'CI', 'CR'];
        $eMaks = [
            'C1' => $data['pairwise_total']['C1']*$data['evnTotal']['C1'][1],
            'C2' => $data['pairwise_total']['C2']*$data['evnTotal']['C2'][1],
            'C3' => $data['pairwise_total']['C3']*$data['evnTotal']['C3'][1],
        ];
        $n = TipeKriteria::count();
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
            'CI' => (array_sum($eMaks)-$n)/$n-1,
            'CR' => ((array_sum($eMaks)-$n)/$n-1)/$randomIndexConsistency,
        ];

        ///////////////////////  Batas Rasio Konsistensi  /////////////////////////////

        return view('apps.analisis-mahasiswa.show',compact('data', 'title'));

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
        Analisis::where('id_user', $id)->delete();
        Jawaban::where('id_user', $id)->delete();

        return back();
    }
}
