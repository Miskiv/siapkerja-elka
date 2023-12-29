<?php

namespace App\Imports;

use App\Http\Controllers\API\ConvertController;
use App\Http\Controllers\API\FilterController;
use App\Http\Controllers\API\GenerateNumberController;
use App\Models\InitialBalance;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class InitialBalanceImport implements ToModel, WithHeadingRow, WithCalculatedFormulas
{
    private $rows = 0;

    public function __construct($request, $upload_id)
    {
        $this->request = $request;
        $this->upload_id = $upload_id;
        $this->convert = new ConvertController;
        $this->filter = new FilterController;
        $this->generateNumber = new GenerateNumberController;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $this->rows++;

        return new InitialBalance([
            'periode' => $this->convert->date_convert($row['periode']),
            'company_code' => $row['company_code'],
            'plant' => $row['plant'],
            'customer' => $row['customer'],
            'saldo_awal' => $row['saldo_awal'],
            'upload_id' => $this->upload_id,
            'upload_date' => $this->request->upload_date,
        ]);
    }

    public function getRowCount(): int
    {
        return $this->rows;
    }
}
