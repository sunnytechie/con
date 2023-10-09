<?php

namespace App\Http\Controllers\Api\V23\Media;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //audio category
    public function audioCategory()
    {
        $audioCategories = \App\Models\Category::where('type', 'audio')->get();
        return response()->json(
            [
                'status' => 'success',
                'data' => $audioCategories
            ],
            200
        );
    }

    //video category
    public function videoCategory()
    {
        $videoCategories = \App\Models\Category::where('type', 'video')->get();
        return response()->json(
            [
                'status' => 'success',
                'data' => $videoCategories
            ],
            200
        );
    }

    //gallery category
    public function galleryCategory()
    {
        $galleryCategories = \App\Models\Category::where('type', 'gallery')->get();
        return response()->json(
            [
                'status' => 'success',
                'data' => $galleryCategories
            ],
            200
        );
    }
}
