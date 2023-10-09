<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cycsubcategory extends Model
{
    protected $table = 'cycsubcategories';
    use HasFactory;

    public function cyccategory()
    {
        return $this->belongsTo(Cyccategory::class);
    }

    public function cycauthors()
    {
        return $this->hasMany(Cycauthor::class);
    }
}
