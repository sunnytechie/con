<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $table = 'replies';

    use HasFactory;

    //relationships - belongs to post
    public function post() {
        return $this->belongsTo(Post::class);
    }

    //relationships - belongs to user
    public function user() {
        return $this->belongsTo(User::class);
    }

    //relationships - belongs to postcomment
    public function postcomment() {
        return $this->belongsTo(Postcomment::class);
    }
}
