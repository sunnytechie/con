<?php

namespace App\Exports;

use App\Models\PurchasedBook;
use Maatwebsite\Excel\Concerns\FromCollection;

class PurchasedBookExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return PurchasedBook::all();
    }
}
