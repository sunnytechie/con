<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Likecomment extends Model
{
    protected $table = 'likecomments';
    use HasFactory;

    public function postcomment() {
        return $this->belongsTo('App\Models\Postcomment');
    }
}
