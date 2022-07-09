<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'thumbnail',
        'video',
        'audio',
        'url',
        'description',
        'category_id',
        'subcategory_id',
        'duration',
        'source',
        'video_type',
        'can_preview',
        'is_free',
        'type',
        'likes_count',
        'dislikes_count',
        'views_count',
        'preview_duration',
        'downloadable',
        'notification',
    ];

    //belongs to category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    //belongs to subcategory
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    //has many comments
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
