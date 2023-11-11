<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Churchyearcalendar extends Model
{
    protected $table = "churchyearcalendars";
    use HasFactory;

    public function cycsubcategory()
    {
        return $this->belongsTo(Cycsubcategory::class);
    }
}
