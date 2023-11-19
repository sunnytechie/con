<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'currency',
        'amount',
        'reason',
        'method',
        'reference',
        'province',
        'diocese',
        'province_id',
        'diocese_id',
        'deleted',
        'phone',
        'donation_type',
        'description',
    ];

    //relationships - belongs to province and diocese
    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function diocese() {
        return $this->belongsTo(Diocese::class);
    }
}
