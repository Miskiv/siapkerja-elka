<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\KriteriaSub;
use App\Models\KriteriaSub2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Master Kriteria';
        $data['kriteria'] = Kriteria::orderBy('id')->get();
        return view('apps.kriteria.index', compact('title', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Master Kriteria';
        return view('apps.kriteria.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $title = 'Master Kriteria';
        $data['kriteria'] = Kriteria::find(Crypt::decryptString($id));
        $data['kriteria_sub'] = KriteriaSub::with('kriteriaSub2')->where('kriteria_id', $data['kriteria']->id)->get();
        return view('apps.kriteria.show', compact('title', 'data'));
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
