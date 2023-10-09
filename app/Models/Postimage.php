<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postimage extends Model
{
    protected $table = 'postimages';
    
    use HasFactory;

    //relationships - belongs to post
    public function post() {
        return $this->belongsTo(Post::class);
    }
}
