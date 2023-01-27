<?php

namespace App\Http\Controllers\Api;

use App\Models\Audio;
use App\Models\Media;
use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ViewsController extends Controller
{
    //store Media Views
    public function updateMediaViews($id)
    {
        $media = Media::find($id);
        $media->views_count += 1;
        $media->save();

        return response()->json([
            'message' => 'Success'
        ], 200);
    }

    //Get Media Views
    public function getMediaViews($id)
    {
        $media = Media::find($id);
        $views = $media->views_count;

        return response()->json([
            'views' => $views
        ], 200);
    }
}
