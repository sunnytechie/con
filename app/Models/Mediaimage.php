<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mediaimage extends Model
{
    protected $table = 'mediaimages';
    use HasFactory;

    //relationship with category
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
