<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Hymnal extends Model
{
    use HasFactory , Searchable;
    
    protected $table = 'hymnals';

    public function toSearchableArray()
    {
        $array = $this->toArray();

        // Customize the data array...

        //Use this to remove fields from the index
        //unset($array['id, user_id, category_id, subcategory_id, provider_id, publish, created_at, updated_at']);
        unset($array['created_at, updated_at']);

        return  [
            'title' => $this->title,
            'number' => $this->number,
        ];
    }
}
