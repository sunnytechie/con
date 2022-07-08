<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'email',
        'media_id',
        'content',
        'type',
        'edited',
        'deleted',
    ];

    //has many reported comments
    public function reportedComments()
    {
        return $this->hasMany(ReportedComment::class);
    }

    //belongs to user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //belongs to media
}
