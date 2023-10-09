<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'description',
        'image',
        'file',
        'bookcategory_id',
        'booksubcategory_id',
        'price',
        'type',
        'tag',
    ];

    //belongs to BookCategory
    public function bookcategory()
    {
        return $this->belongsTo(Bookcategory::class);
    }

    //belongs to BookSubCategory
    public function booksubcategory()
    {
        return $this->belongsTo(Booksubcategory::class);
    }

    //has many BookSubCategory
    public function booksubcategories()
    {
        return $this->hasMany(Booksubcategory::class);
    }

    //has many PurchasedBook
    public function purchasedbooks()
    {
        return $this->hasMany(PurchasedBook::class);
    }
}
