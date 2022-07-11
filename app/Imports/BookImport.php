<?php

namespace App\Imports;

use App\Models\Book;
use Maatwebsite\Excel\Concerns\ToModel;

class BookImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Book([
            'title' => $row[0],
            'author' => $row[1],
            'description' => $row[2],
            'image' => $row[3],
            'file' => $row[4],
            'bookcategory_id' => $row[5],
            'booksubcategory_id' => $row[6],
            'price' => $row[7],
            'type' => $row[8],
            'created_at' => $row[9],
            'updated_at' => $row[10],
        ]);
    }
}
