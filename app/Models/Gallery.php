<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'gallery';
    use HasFactory;

    //relationship with category
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function gallerycategory() {
        return $this->belongsTo(Gallerycategory::class);
    }
}
