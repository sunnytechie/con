<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchasedstudy extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'study_id',
        'study_title',
        'study_category_name',
        'price',
        'transaction_ref',
        'payment_status',
        'deleted',
    ];

    public function study()
    {
        return $this->belongsTo(Study::class);
    }
    
}
