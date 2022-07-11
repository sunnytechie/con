<?php

namespace App\Imports;

use App\Models\Comment;
use Maatwebsite\Excel\Concerns\ToModel;

class CommentImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Comment([
            'user_id' => $row[0],
            'email' => $row[1],
            'media_id' => $row[2],
            'content' => $row[3],
            'type' => $row[4],
            'edited' => $row[5],
            'deleted' => $row[6],
            'created_at' => $row[7],
            'updated_at' => $row[8],
        ]);
    }
}
