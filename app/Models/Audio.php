<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audio extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'thumbnail',
        'audio',
        'url',
        'description',
        'category_id',
        'duration',
        'downloadable',
        'notification',
    ];

    //belongs to category
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
