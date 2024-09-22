<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use App\Models\Hasil;
use App\Models\Kriteria;
use App\Models\Menu;
use App\Models\Prodi;
use App\Models\User;
use App\Models\Version;
use Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rolesToCheck = ['Admin', 'TIM UHI', 'Staff Departemen'];
        if(Auth::user()->roles()->whereIn('name', $rolesToCheck)->exists()){
            $kriteria = Kriteria::get();
            $persentase = [];
            $kriteriaIds = [];
            foreach($kriteria as $row){
                // dd($row->kriteria_name);
                $kriteriaIds[$row->kriteria_name] = $row->id;
            }

            foreach ($kriteriaIds as $kriteriaId) {
                $persentase[$kriteriaId] = Hasil::with('KriteriaSub')
                    ->where('kriteria_id', $kriteriaId)
                    ->select('kriteria_unggul', DB::raw('count(*) as total'))
                    ->groupBy('kriteria_unggul')
                    ->get();
            }

            $chart = [];

            foreach ($persentase as $kriteriaId => $items) {
                $hasilArray = [];
                foreach ($items as $item) {
                    $hasilArray[$item->KriteriaSub->nama] = $item->total;
                }

                $chart['Labels' . $kriteriaId] = array_keys($hasilArray);
                $chart['Data' . $kriteriaId] = array_values($hasilArray);
            }

            $prodi = Prodi::withCount('User')->get();

            return view('apps.home.dash', compact( 'chart', 'kriteriaIds', 'prodi'));
        }else{
            return view('apps.home.index');
        }
    }

    /**
     * Display a dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $data = [];
        $menu = Menu::where('url', request()->path())->first();

        return view('apps.dashboard.dash', compact('menu', 'data'));
    }

    /**
     * Display a version.
     *
     * @return \Illuminate\Http\Response
     */
    public function version()
    {
        $version = Version::get();

        return view('layouts.components.version', compact('version'));
    }
}
