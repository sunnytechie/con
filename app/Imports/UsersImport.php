<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'name'     => $row[0],
            'email'    => $row[1],
            'is_admin' => $row[2],
            'role'     => $row[3],
            'email_verified_at' => $row[4],
            'password' => $row[5],
            'remember_token' => $row[6],
            'login_type' => $row[7],
            'blocked' => $row[8],
            'isDeleted' => $row[9],
            'subscribed' => $row[10],
            'subscribe_expiry_date' => $row[11],
            'subscribe_plan' => $row[12],
            'subscribe_token' => $row[13],
            'sub_type' => $row[14],
            'user_otp' => $row[15],
            'created_at' => $row[16],
            'updated_at' => $row[17],
        ]);
    }
}
