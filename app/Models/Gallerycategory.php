<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallerycategory extends Model
{
    protected $table = "gallerycategories";
    use HasFactory;

    //has many gallery
    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }
}
