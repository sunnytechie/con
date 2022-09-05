<?php

namespace App\Exports;

use App\Models\Prayer;
use Maatwebsite\Excel\Concerns\FromCollection;

class PrayersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Prayer::all();
    }
}
