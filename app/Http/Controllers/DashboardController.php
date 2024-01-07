<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use App\Models\Menu;
use App\Models\Version;
use Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('apps.home.index');
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
