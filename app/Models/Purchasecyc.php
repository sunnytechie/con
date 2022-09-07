<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchasecyc extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'cyc_id',
        'cyc_title',
        'cyc_year',
        'price',
        'transaction_ref',
        'payment_status',
        'deleted',
    ];

    public function cyc()
    {
        return $this->belongsTo(Cyc::class);
    }
}
