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
        // dd($skalaValues);
        $matriksData = [
            'C1' => [1, $skalaValues[0], $skalaValues[1]],
            'C2' => [round(1/$skalaValues[0], 2), 1, $skalaValues[2]],
            'C3' => [1/$skalaValues[1], round(1/$skalaValues[2], 2), 1],
        ];
        return view('apps.analisis-mahasiswa.index',compact('title','kolomLabels','barisLabels','matriksData', 'data'));
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
