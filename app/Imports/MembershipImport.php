<?php

namespace App\Imports;

use App\Models\Membership;
use Maatwebsite\Excel\Concerns\ToModel;

class MembershipImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Membership([
            'first_name' => $row[0],
            'last_name' => $row[1],
            'email' => $row[2],
            'email2' => $row[3],
            'phone' => $row[4],
            'phone2' => $row[5],
            'street' => $row[6],
            'city' => $row[7],
            'state' => $row[8],
            'country' => $row[9],
            'province' => $row[10],
            'diocease' => $row[11],
            'date_of_birth' => $row[12],
            'wedding_date' => $row[13],
            'local_church_address' => $row[14],
            'created_at' => $row[15],
            'updated_at' => $row[16],
        ]);
    }
}
