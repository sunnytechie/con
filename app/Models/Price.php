<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;

    protected $fillable = [
        'daily_dynamite',
        'daily_fountain',
        'bible_study',
        'cyc',
        'cyc_calender',
        'bcp',
        'hymnal',
    ];
}
