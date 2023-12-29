<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class DokumenExport implements FromView, ShouldAutoSize
{
    public function __construct($riwayat)
    {
        $this->riwayat = $riwayat;
    }

    public function view(): View
    {
        return view('apps.dokumen.export', [
            'riwayat' => $this->riwayat,
        ]);
    }
}
