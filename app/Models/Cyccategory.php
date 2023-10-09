<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cyccategory extends Model
{
    protected $table = 'cyccategories';
    use HasFactory;

    public function cycsubcategories()
    {
        return $this->hasMany(Cycsubcategory::class);
    }

    //has many cycauthors through cycsubcategories
    public function cycauthors()
    {
        return $this->hasManyThrough(Cycauthor::class, Cycsubcategory::class);
    }
}
