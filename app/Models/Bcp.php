<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bcp extends Model
{
    use HasFactory;

    protected $table = 'bcps';

    public function bcpcategory()
    {
        return $this->belongsTo(Bcpcategory::class);
    }

    public function bcpsubcategory()
    {
        return $this->belongsTo(Bcpsubcategory::class);
    }
}
