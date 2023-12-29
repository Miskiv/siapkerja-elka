<?php

namespace App\Console\Commands;

use App\Imports\DataOpexImport;
use Illuminate\Console\Command;

class ImportExcel extends Command
{
    protected $signature = 'import:excel';

    protected $description = 'Laravel Excel importer';

    public function handle()
    {
        $this->output->title('Starting import');
        (new DataOpexImport)->withOutput($this->output)->import(public_path('KFTD2.xlsx'));
        $this->output->success('Import successful');
    }
}
