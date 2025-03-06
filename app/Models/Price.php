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
        'daily_dynamite_usd',
        'daily_fountain_usd',
        'bible_study_usd',
        'cyc_usd',
        'cyc_calender_usd',
        'bcp_usd',
        'hymnal_usd',
        'daily_dynamite_euro',
        'daily_fountain_euro',
        'bible_study_euro',
        'cyc_euro',
        'cyc_calender_euro',
        'bcp_euro',
        'hymnal_euro',
        'daily_dynamite_pounds',
        'daily_fountain_pounds',
        'bible_study_pounds',
        'cyc_pounds',
        'cyc_calender_pounds',
        'bcp_pounds',
        'hymnal_pounds',
    ];
}
