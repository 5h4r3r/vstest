<?php

namespace App\Exports;

use App\Models\ZKH;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExcelExport implements FromCollection
{
    public function collection()
    {
        return ZKH::all();
    }
}
