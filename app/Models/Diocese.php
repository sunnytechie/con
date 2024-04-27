<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diocese extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'province_id',
    ];

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }

    //belongs to donation
    public function donation()
    {
        return $this->belongsTo(Donation::class);
    }

}

