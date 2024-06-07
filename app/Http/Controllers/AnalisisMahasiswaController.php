<?php

namespace App\Http\Controllers;

use App\Models\Analisis;
use App\Models\Hasil;
use App\Models\Jawaban;
use App\Models\KriteriaSub;
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
        $data['analisis'] = Hasil::get();

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
        $title = 'Analisis Mahasiswa';
        $data['hasil'] = Hasil::where('user_id', $id)->first();
   
        return view('apps.analisis-mahasiswa.show',compact('data', 'title'));

    }

    /**
     * Display the specified resource.
     */
    public function showAnalisis(string $id, $kriteria_id)
    {
        $title = 'Analisis Mahasiswa';
        $hasil = Hasil::with('Detail')->where('kriteria_id', $kriteria_id)->where('user_id', $id)->first();
        $kriteria_sub = KriteriaSub::where('kriteria_id', $kriteria_id)->get();
        $totalEvn = $hasil->Detail->pluck('totalEvn')->map(function($value) {
            return (float) $value;
        });
        
        $perbandinganCode = $hasil->Detail->pluck('perbandingan_code');
        
        $jsonTotalEvn = $totalEvn->toJson();
        $jsonPerbandinganCode = $perbandinganCode->toJson();
        return view('apps.analisis-mahasiswa.show',compact('title', 'hasil', 'jsonTotalEvn', 'jsonPerbandinganCode', 'kriteria_sub'));

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
