<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bcpsubcategory extends Model
{
    protected $table = 'bcpsubcategories';
    use HasFactory;

    public function bcp()
    {
        return $this->hasMany(Bcp::class);
    }

    public function bcpcategory()
    {
        return $this->belongsTo(Bcpcategory::class);
    }
}
