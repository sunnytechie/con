<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Study extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'study_name',
        'study_date',
        'head_date',
        'theme',
        'sub_theme',
        'topic',
        'study_text',
        'study_title',
        'study_content',
        'aims',
        'introduction',
        'study_guide',
        'conclusion',
        'food_for_thought',
        'memory_verse',
        'verse_content',
        'anchor_verse_number',
        'anchor_verse_text',
        'anchor_verse_contents',
        'prayer',
        'study_year',
    ];
}
