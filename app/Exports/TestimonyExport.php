<?php

namespace App\Exports;

use App\Models\Testimony;
use Maatwebsite\Excel\Concerns\FromCollection;

class TestimonyExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Testimony::all();
    }
}
