<?php

namespace App\Imports;

use App\Models\Testimony;
use Maatwebsite\Excel\Concerns\ToModel;

class TestimonyImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Testimony([
            'user_id'=> $row[0],
            'fullname'=> $row[1],
            'email'=> $row[2],
            'title'=> $row[3],
            'body'=> $row[4],
        ]);
    }
}
