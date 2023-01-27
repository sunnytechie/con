<?php

namespace App\Http\Controllers\Api;

use App\Models\Audio;
use App\Models\Media;
use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LikesController extends Controller
{
    //store Media Likes
    public function updateMediaLikes($id)
    {
        $media = Media::find($id);
        $media->likes_count += 1;
        $media->save();

        $likes = $media->likes_count;

        return response()->json([
            'likes' => $likes,
            'message' => 'Success',
        ], 200);
    }

    //Get Media Likes
    public function getMediaLikes($id)
    {
        $media = Media::find($id);
        $likes = $media->likes_count;

        return response()->json([
            'likes' => $likes
        ], 200);
    }
}
