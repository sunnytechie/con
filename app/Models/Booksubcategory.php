<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booksubcategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'thumbnail',
        'bookcategory_id',
    ];

    //belongs to Bookcategory
    public function bookcategory()
    {
        return $this->belongsTo(Bookcategory::class);
    }

    //has many Book
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
