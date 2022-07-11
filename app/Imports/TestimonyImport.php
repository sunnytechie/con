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
            //
        ]);
    }
}
