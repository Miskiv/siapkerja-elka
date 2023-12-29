<?php

namespace App\Imports;

use App\Http\Controllers\API\ConvertController;
use App\Models\Amount;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AmountImport implements ToModel, WithHeadingRow, WithCalculatedFormulas
{
    private $rows = 0;

    public function __construct($request, $upload_id)
    {
        $this->request = $request;
        $this->upload_id = $upload_id;
        $this->convert = new ConvertController;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $this->rows++;

        return new Amount([
            'periode' => $this->convert->date_convert($row['periode']),
            'company_code' => $row['company_code'],
            'plant' => $row['plant'],
            'customer' => $row['customer'],
            'lini_segment' => $row['lini_segment'],
            'penambahan' => $row['penambahan'],
            'pencairan' => $row['pencairan'],
            'aging_belum_jatuh_tempo' => $row['aging_belum_jatuh_tempo'],
            'aging_0_30' => $row['aging_0_30'],
            'aging_31_60' => $row['aging_31_60'],
            'aging_61_90' => $row['aging_61_90'],
            'aging_91_180' => $row['aging_91_180'],
            'aging_361_999' => $row['aging_361_999'],
            'upload_id' => $this->upload_id,
            'upload_date' => $this->request->upload_date,
        ]);
    }

    public function getRowCount(): int
    {
        return $this->rows;
    }
}
