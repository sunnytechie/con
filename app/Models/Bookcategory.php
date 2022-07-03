<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookcategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'thumbnail',
    ];

    //has many Book
    public function books()
    {
        return $this->hasMany(Book::class);
    }

    //has many Booksubcategory
    public function booksubcategories()
    {
        return $this->hasMany(Booksubcategory::class);
    }
}
