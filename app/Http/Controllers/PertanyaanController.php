<?php

namespace App\Http\Controllers;

use App\Models\Pertanyaan;
use App\Models\TipeKriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PertanyaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['pertanyaan'] = Pertanyaan::with('TipeKriteria')->orderBy('created_at', 'asc')->get();
        $data['tipe_kriteria'] = TipeKriteria::orderBy('id')->get();
        $title = 'Pertanyaan';

        return view('apps.pertanyaan.index', compact('data', 'title'));
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
        $data['pertanyaan'] = Pertanyaan::create([
            'soal' => $request->soal,
            'tipe_kriteria' => $request->tipe_kriteria
        ]);

        activity()->log(''.Auth::user()->name.' Menambahkan pertanyaan dengan id = '.$data['pertanyaan']->id.' ');
        
        return back()->with('success', 'Pertanyaan Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pertanyaan $pertanyaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pertanyaan $pertanyaan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pertanyaan $pertanyaan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pertanyaan $pertanyaan)
    {
        //
    }
}
