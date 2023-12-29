<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Carbon\Carbon;

class ConvertController extends Controller
{
    public function date_convert($date)
    {
        if (is_numeric($date)) {
            $EXCEL_DATE = $date; // Your CSV value goes here
            $UNIX_DATE = ($EXCEL_DATE - 25569) * 86400;
            $date = gmdate('Y-m-d', $UNIX_DATE);
        } else {
            $date = null;
        }

        return $date;
    }

    public function time_convert($time)
    {
        if (is_numeric($time)) {
            $EXCEL_DATE = $time; // Your CSV value goes here
            $UNIX_DATE = ($EXCEL_DATE - 25569) * 86400;
            $date = gmdate('H:i:s', $UNIX_DATE);
        } else {
            $date = null;
        }

        return $date;
    }

    public function transformDate($value, $format = 'Y-m-d')
    {
        try {
            return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
        } catch (\ErrorException $e) {
            return \Carbon\Carbon::createFromFormat($format, $value);
        }
    }

    public function date_convertCSV($date)
    {
        return $date ? Carbon::createFromFormat('m/d/Y', $date)->toDateString() : null;
    }

    public function buatkode($nomor_terakhir, $kunci, $jumlah_karakter = 0)
    {
        $nomor_baru = intval(substr($nomor_terakhir, strlen($kunci))) + 1;
        //menambahkan nol didepan nomor baru sesuai panjang jumlah karakter
        $nomor_baru_plus_nol = str_pad($nomor_baru, $jumlah_karakter, '0', STR_PAD_LEFT);
        //menyusun kunci dan nomor baru
        $kode = $kunci.$nomor_baru_plus_nol;

        return $kode;
    }
}
