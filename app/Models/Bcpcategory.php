<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bcpcategory extends Model
{
    protected $table = 'bcpcategories';
    use HasFactory;

    public function bcp()
    {
        return $this->hasMany(Bcp::class);
    }

    public function bcpsubcategory()
    {
        return $this->hasMany(Bcpsubcategory::class);
    }
}
