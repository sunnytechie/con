<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportedComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'email',
        'comment_id',
        'reason',
        'type',
    ];

    //belongs to comment
    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }

    //belongs to user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
