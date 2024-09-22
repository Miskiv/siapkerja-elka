<?php

namespace App\Http\Controllers;

use App\Models\Analisis;
use App\Models\Hasil;
use App\Models\KriteriaSub;
use App\Models\TipeKriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HasilAnalisisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Hasil Analisis';
        $data['hasil'] = Hasil::where('user_id', Auth::user()->id)->first();

        return view('apps.hasil-analisis.index', compact('title', 'data'));
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
        $title = 'Hasil Analitic';
        $hasil = Hasil::with('Detail', 'KriteriaSub')->where('kriteria_id', $id)->where('user_id', Auth::user()->id)->first();
        $kriteriaRendah = KriteriaSub::where('kriteria_id', $id)->whereNot('id', $hasil->kriteria_unggul)->get();
        $namaKriteriaRendah = $kriteriaRendah->pluck('nama')->toArray();
        $namaKriteriaRendahString = implode(', ', $namaKriteriaRendah);
        $kriteria_sub = KriteriaSub::where('kriteria_id', $id)->get();
        $totalEvn = $hasil->Detail->pluck('totalEvn')->map(function($value) {
            return (float) $value;
        });

        $perbandinganCode = $hasil->Detail->pluck('perbandingan_code');
        $perbandinganCode = KriteriaSub::where('kriteria_id', $id)->get();
        $perbandinganCode = $perbandinganCode->pluck('nama');

        $jsonTotalEvn = $totalEvn->toJson();
        $jsonPerbandinganCode = $perbandinganCode->toJson();

        return view('apps.hasil-analisis.index', compact('title', 'hasil', 'jsonTotalEvn', 'jsonPerbandinganCode', 'kriteria_sub', 'namaKriteriaRendahString'));
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
