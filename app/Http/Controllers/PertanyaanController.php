<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\KriteriaSub;
use App\Models\KriteriaSub2;
use App\Models\Pertanyaan;
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
        $data['kriteria'] = Kriteria::orderBy('id')->get();
        $data['kriteria_sub'] = KriteriaSub::with('Kriteria')->orderBy('id')->get();
        $data['kriteria_sub2'] = KriteriaSub2::with('KriteriaSub')->orderBy('id')->get();
        $data['pertanyaan'] = Pertanyaan::get();
        $title = 'Pertanyaan';

        return view('apps.pertanyaan.index', compact('data','title'));
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
        $data['pertanyaan'] = Pertanyaan::find($request->perbandingan_sub);
        $data['pertanyaan']->update([
            'soal' => $request->soal
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

    public function generateComparisons($id) {
        $data['kriteria_sub'] = KriteriaSub::with('kriteriaSub2')->where('kriteria_id', $id)->get();
        
        $criteria = $data['kriteria_sub'];
        $n = count($criteria);
        $comparisons = [];
        
        for ($i = 0; $i < $n; $i++) {
            for ($j = $i + 1; $j < $n; $j++) {
                // $comparisons[] = $criteria[$i]['kriteriaSub2'][0]['nama'] . ' > ' . $criteria[$j]['kriteriaSub2'][0]['nama'];
                // $comparisons[] = $criteria[$i]['kriteriaSub2'][1]['nama'] . ' > ' . $criteria[$j]['kriteriaSub2'][1]['nama'];
                // $comparisons[] = $criteria[$i]['kriteriaSub2'][2]['nama'] . ' > ' . $criteria[$j]['kriteriaSub2'][2]['nama'];
                // $comparisons[] = $criteria[$i]['kriteriaSub2'][3]['nama'] . ' > ' . $criteria[$j]['kriteriaSub2'][3]['nama'];
                $comparisons[] = [
                    'perbandingan_name' => $criteria[$i]['kriteriaSub2'][0]['nama'] . ' : ' . $criteria[$j]['kriteriaSub2'][0]['nama'],
                    'perbandingan_kriteria_sub' => $criteria[$i]['id'] . ' : ' . $criteria[$j]['id'],
                ];
                $comparisons[] = [
                    'perbandingan_name' => $criteria[$i]['kriteriaSub2'][1]['nama'] . ' : ' . $criteria[$j]['kriteriaSub2'][1]['nama'],
                    'perbandingan_kriteria_sub' => $criteria[$i]['id'] . ' : ' . $criteria[$j]['id'],
                ];
                $comparisons[] = [
                    'perbandingan_name' => $criteria[$i]['kriteriaSub2'][2]['nama'] . ' : ' . $criteria[$j]['kriteriaSub2'][2]['nama'],
                    'perbandingan_kriteria_sub' => $criteria[$i]['id'] . ' : ' . $criteria[$j]['id'],
                ];
                $comparisons[] = [
                    'perbandingan_name' => $criteria[$i]['kriteriaSub2'][3]['nama'] . ' : ' . $criteria[$j]['kriteriaSub2'][3]['nama'],
                    'perbandingan_kriteria_sub' => $criteria[$i]['id'] . ' : ' . $criteria[$j]['id'],
                ];
            }
        }
        foreach($comparisons as $comparison){
            $data['pertanyaan'] = Pertanyaan::create([
                'perbandingan_name' => $comparison['perbandingan_name'],
                'kriteria_id' => $id,
                'perbandingan_kriteria_sub' => $comparison['perbandingan_kriteria_sub']
            ]);
        }

        return back();
    }

    public function getperbandingan($param){
        $data['pertanyaan'] = Pertanyaan::where('kriteria_id', $param)->where('soal', null)->get();
        return response()->json($data['pertanyaan']);
    }
}
