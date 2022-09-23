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
            'email' => $row[0],
            'email2' => $row[1],
            'phone' => $row[2],
            'phone2' => $row[3],
            'street' => $row[4],
            'city' => $row[5],
            'state' => $row[6],
            'country' => $row[7],
            'province' => $row[8],
            'diocease' => $row[9],
            'date_of_birth' => $row[10],
            'wedding_date' => $row[11],
            'local_church_address' => $row[12],
            'fullname' => $row[13],
        ]);
    }
}
