<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Membership extends Model
{
    use HasFactory, Searchable;

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
        'fullname',
    ];

    //belongs to user through email
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'email', 'email');
    }

    //searchable array
    public function toSearchableArray()
    {
        return [
            'email' => $this->email,
            'email2' => $this->email2,
            'phone' => $this->phone,
            'phone2' => $this->phone2,
            'street' => $this->street,
            'city' => $this->city,
            'state' => $this->state,
            'country' => $this->country,
            'province' => $this->province,
            'diocease' => $this->diocease,
            'date_of_birth' => $this->date_of_birth,
            'wedding_date' => $this->wedding_date,
            'local_church_address' => $this->local_church_address,
            'fullname' => $this->fullnamel
        ];
    }
}
