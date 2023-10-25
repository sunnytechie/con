<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    use HasFactory;

    //relationships - belongs to user
    public function user() {
        return $this->belongsTo(User::class);
    }

    //relationships - has many postcomments
    public function postcomments() {
        return $this->hasMany(Postcomment::class);
    }

    //relationships - has many postlikes
    public function postlikes() {
        return $this->hasMany(Postlike::class);
    }

    //relationships - belongs to savedpost
    //public function savedpost() {
    //    return $this->belongsTo(Savedpost::class);
    //}

    //relationships - has many postimages
    public function postimages() {
        return $this->hasMany(Postimage::class);
    }
}
