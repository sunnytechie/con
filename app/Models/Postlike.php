<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postlike extends Model
{
    protected $table = 'postlikes';

    use HasFactory;

    //relationships - belongs to post
    public function post() {
        return $this->belongsTo(Post::class);
    }

    //relationship - belongs to user
    public function user() {
        return $this->belongsTo(User::class);
    }
}
