<?php

namespace App\Imports;

use App\Models\PurchasedBook;
use Maatwebsite\Excel\Concerns\ToModel;

class PurchasedBookImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new PurchasedBook([
            'email' => $row[0],
            'book_id' => $row[1],
            'price' => $row[2],
            'transaction_ref' => $row[3],
            'payment_status' => $row[4],
            'deleted' => $row[5],
        ]);
    }
}
