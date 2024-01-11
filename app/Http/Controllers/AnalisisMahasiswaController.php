<?php

namespace App\Http\Controllers;

use App\Models\Analisis;
use Illuminate\Http\Request;

class AnalisisMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Analisis Mahasiswa';
        $data['analisis'] = Analisis::get();
        $skalaValues = $data['analisis']->pluck('skala')->unique()->values()->all();
        $kolomLabels = ['C1', 'C2', 'C3'];
        $barisLabels = ['C1', 'C2', 'C3'];

        /////////////////////////////     Pairwise Comparisons    /////////////////////////////
        $p = [
            'C1' => [1, $skalaValues[0], $skalaValues[1]],
            'C2' => [round(1/$skalaValues[0], 2), 1, $skalaValues[2]],
            'C3' => [1/$skalaValues[1], round(1/$skalaValues[2], 2), 1],
        ];
        ////////////////////////////  Batas Pairwise Comparisons    ///////////////////////////

        ///////////////////////////      Eigen Vektor Normalisasi    /////////////////////////
        $e1 = [
            'a1' => [$p['C1'][0]*$p['C1'][0], $p['C2'][0]*$p['C1'][1], $p['C3'][0]*$p['C1'][2]],
            'a2' => [$p['C1'][0]*$p['C1'][1], $p['C1'][1]*$p['C2'][1], $p['C3'][1]*$p['C1'][2]],
            'a3' => [$p['C1'][0]*$p['C1'][2], $p['C1'][1]*$p['C2'][2], $p['C1'][2]*$p['C3'][2]],
        ];
        $eigenVektor1 = [
            'C1' => [$e1['a1'][0], $e1['a1'][1], $e1['a1'][2]],
            'C2' => [$e1['a2'][0], $e1['a2'][1], $e1['a2'][2]],
            'C3' => [$e1['a3'][0], $e1['a3'][1], $e1['a3'][2]],
        ];

        $e2 = [
            'a1' => [$p['C2'][0]*$p['C1'][0], $p['C2'][1]*$p['C2'][0], $p['C2'][2]*$p['C3'][0]],
            'a2' => [$p['C2'][0]*$p['C1'][1], $p['C2'][1]*$p['C2'][1], $p['C2'][2]*$p['C3'][2]],
            'a3' => [$p['C2'][0]*$p['C1'][2], $p['C2'][1]*$p['C2'][2], $p['C2'][2]*$p['C3'][2]],
        ];
        $eigenVektor2 = [
            'C1' => [$e2['a1'][0], $e2['a1'][1], $e2['a1'][2]],
            'C2' => [$e2['a2'][0], $e2['a2'][1], $e2['a2'][2]],
            'C3' => [$e2['a3'][0], $e2['a3'][1], $e2['a3'][2]],
        ];

        $e3 = [
            'a1' => [$p['C3'][0]*$p['C1'][0], $p['C3'][1]*$p['C2'][0], $p['C3'][2]*$p['C3'][0]],
            'a2' => [$p['C3'][0]*$p['C1'][1], $p['C3'][1]*$p['C2'][1], $p['C3'][1]*$p['C3'][2]],
            'a3' => [$p['C3'][0]*$p['C1'][2], $p['C3'][1]*$p['C2'][2], $p['C3'][2]*$p['C3'][2]],
        ];
        $eigenVektor3 = [
            'C1' => [$e1['a1'][0], $e1['a1'][1], $e1['a1'][2]],
            'C2' => [$e1['a2'][0], $e1['a2'][1], $e1['a2'][2]],
            'C3' => [$e1['a3'][0], $e1['a3'][1], $e1['a3'][2]],
        ];
        /////////////////////////////    Batas Eigen Vektor Normalisasi   //////////////////////


        return view('apps.analisis-mahasiswa.index',compact('title','kolomLabels','barisLabels', 'data','eigenVektor3', 'eigenVektor2', 'eigenVektor1', 'e1', 'p'));
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
        //
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
