<?php

namespace App\Http\Controllers;

use App\Models\Analisis;
use App\Models\Jawaban;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KuesionerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['pertanyaan'] = Pertanyaan::orderBy('tipe_kriteria')->get()->groupBy('tipe_kriteria');
        $data['exist'] = Jawaban::where('id_user', auth()->user()->id)->exists();
        // dd($pertanyaan);
        return view('apps.kuesioner.index', compact('data'));
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
        
        foreach ($request->jawaban as $tipe_kriteria => $jawabanFase) {
            foreach ($jawabanFase as $id_pertanyaan => $jawaban) {
                Jawaban::create([
                    'id_user' => Auth::user()->id, // Sesuaikan dengan model dan kolom yang sesuai
                    'tipe_kriteria' => $tipe_kriteria,
                    'id_pertanyaan' => $id_pertanyaan,
                    'jawaban' => $jawaban,
                ]);
            }
        }
        $jawaban = Jawaban::where('id_user', Auth::user()->id)->groupBy('tipe_kriteria')->selectRaw('*, sum(jawaban) as skor')->get();
        foreach($jawaban as $row){
            if($row->skor == 1){
                $skala = 1;
            }elseif($row->skor == 2){
                $skala = 3;
            }elseif($row->skor == 3){
                $skala = 5;
            }elseif($row->skor == 4){
                $skala = 7;
            }
            Analisis::create([
                'id_jawaban' => $row->tipe_kriteria,
                'id_user' => $row->id_user,
                'skala' => $skala
            ]);
        }
        return back();
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
