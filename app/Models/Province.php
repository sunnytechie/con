<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'state_name',
    ];

    public function dioceses()
    {
        return $this->hasMany(Diocese::class);
    }


    public function donations()
    {
        return $this->hasMany(Donation::class);
    }

    public function cycprovinces()
    {
        return $this->hasMany(Cycprovince::class);
    }
}
