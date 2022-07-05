<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchasedBook extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'book_id',
        'price',
        'transaction_ref',
        'payment_status',
        'deleted',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
