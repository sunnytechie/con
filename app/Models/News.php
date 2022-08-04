<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'details',
        'news_date',
        'thumbnail',
        'author',
        'bible_verse',
        'url',
    ];
}
