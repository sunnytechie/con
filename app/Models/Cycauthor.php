<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cycauthor extends Model
{
    protected $table = 'cycauthors';
    use HasFactory;

    public function cycsubcategory()
    {
        return $this->belongsTo(Cycsubcategory::class);
    }

    public function cyccategory()
    {
        return $this->belongsTo(Cyccategory::class);
    }
}
