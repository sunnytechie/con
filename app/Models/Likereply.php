<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Likereply extends Model
{
    protected $table = 'likereplies';

    use HasFactory;

    //relationships - belongs to reply
    public function reply() {
        return $this->belongsTo(Reply::class);
    }

    //relationships - belongs to user
    public function user() {
        return $this->belongsTo(User::class);
    }

    
}
