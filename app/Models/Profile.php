<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'email2',
        'phone',
        'phone2',
        'street',
        'city',
        'state',
        'country',
        'province',
        'diocease',
        'date_of_birth',
        'wedding_date',
        'local_church_address',
    ];

    //belongs to user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
