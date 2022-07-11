<?php

namespace App\Imports;

use App\Models\Donation;
use Maatwebsite\Excel\Concerns\ToModel;

class DonationImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Donation([
            'name' => $row[0],
            'email' => $row[1],
            'currency' => $row[2],
            'amount' => $row[3],
            'reason' => $row[4],
            'method' => $row[5],
            'reference' => $row[6],
            'province' => $row[7],
            'diocese' => $row[8],
            'deleted' => $row[9],
            'created_at' => $row[10],
            'updated_at' => $row[11],
        ]);
    }
}
