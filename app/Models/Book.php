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
        'category_id',
    ];

    //belongs to category
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
