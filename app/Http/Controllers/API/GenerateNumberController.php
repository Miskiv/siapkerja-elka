<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

class GenerateNumberController extends Controller
{
    public function __construct()
    {
        $this->convert = new ConvertController;
    }

    /**
     * Generate number.
     *
     * @return \Illuminate\Http\Response
     */
    public function generate($param, $model)
    {
        //Generate Kode Master Customer
        $bulan = date('m');
        $tahun = date('Y');
        $thn = substr($tahun, 2, 2);
        $code = $param;
        $lastcode = $model->whereMonth('upload_date', $bulan)->whereYear('upload_date', $tahun)->Where('upload_id', 'like', $code.'%')->orderBy('upload_id', 'DESC')->first();
        if ($lastcode == null) {
            $nomorterakhir = '00';
        } else {
            $nomorterakhir = $lastcode->upload_id;
        }

        $upload_id = $this->convert->buatkode($nomorterakhir, $code.$bulan.$thn, 4);

        return $upload_id;
    }
}
