<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Savedpost extends Model
{
    protected $table = 'savedposts';

    use HasFactory;

    //relationships - has many posts
    public function posts() {
        return $this->hasMany(Post::class);
    }

    //relationship - belongs to user
    public function user() {
        return $this->belongsTo(User::class);
    }
}
