<?php

namespace App\Imports;

use App\Models\Feedback;
use Maatwebsite\Excel\Concerns\ToModel;

class FeedbackImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Feedback([
            'feedback_type' => $row[0],
            'user_fullname' => $row[1],
            'user_email' => $row[2],
            'feedback_msg' => $row[3],
        ]);
    }
}
