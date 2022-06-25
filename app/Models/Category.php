<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    protected $fillable = ['title', 'thumbnail'];

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    public function audios()
    {
        return $this->hasMany(Audio::class);
    }

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
