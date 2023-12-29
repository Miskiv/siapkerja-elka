<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\MasterPlant;

class FilterController extends Controller
{
    public function filter()
    {
        $data['f_plant'] = ['1201', '2101'];
        $data['material_type'] = ['ZPJ1', 'ZPJ2', 'ZPJ3'];
        $data['v_plant'] = MasterPlant::where('status_aktif', 't')->get();

        return $data;
    }
}
