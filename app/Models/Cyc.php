<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cyc extends Model
{
    use HasFactory;

    protected $fillable = [
        'cyc_title',
        'cyc_year',
        'cyc_pdf',
    ];

    public function purchasecycs()
    {
        return $this->hasMany(Purchasecyc::class);
    }

    public function cycsubcategory()
    {
        return $this->belongsTo(Cycsubcategory::class);
    }
}
