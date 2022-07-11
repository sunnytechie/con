<?php

namespace App\Imports;

use App\Models\Media;
use Maatwebsite\Excel\Concerns\ToModel;

class MediaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Media([
            'title' => $row[0],
            'thumbnail' => $row[1],
            'video' => $row[2],
            'audio' => $row[3],
            'url' => $row[4],
            'description' => $row[5],
            'category_id' => $row[6],
            'subcategory_id' => $row[7],
            'duration' => $row[8],
            'source' => $row[9],
            'video_type' => $row[10],
            'can_preview' => $row[11],
            'is_free' => $row[12],
            'type' => $row[13],
            'likes_count' => $row[14],
            'dislikes_count' => $row[15],
            'views_count' => $row[16],
            'preview_duration' => $row[17],
            'downloadable' => $row[18],
            'notification' => $row[19],
            'created_at' => $row[20],
            'updated_at' => $row[21],
        ]);
    }
}
