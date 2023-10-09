<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postcomment extends Model
{
    protected $table = 'postcomments';

    use HasFactory;

    //relationships - belongs to post
    public function post() {
        return $this->belongsTo(Post::class);
    }

    //relationships - belongs to user
    public function user() {
        return $this->belongsTo(User::class);
    }

    //relationships - has many replies
    public function replies() {
        return $this->hasMany(Reply::class);
    }


}
