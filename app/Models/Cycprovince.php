<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cycprovince extends Model
{
    use HasFactory;

    protected $fillable = [
        'province_name',
        'province_id',
        'diocese',
        'inagurated',
        'img_url',
        'rev_name',
        'rev_title',
        'court',
        'address',
        'po_box',
        'tel',
        'email',
        'email_2',
        'website',
        'synod_name',
        'synod_title',
        'synod_address',
        'synod_email',
        'synod_tel',
    ];

    public function province()
    {
        return $this->belongsTo(Province::class);
    }
}
