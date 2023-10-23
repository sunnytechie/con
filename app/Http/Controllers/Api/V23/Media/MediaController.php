<?php

namespace App\Http\Controllers\Api\V23\Media;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class MediaController extends Controller
{
    //audio media category_id
    public function audio(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
        ]);

        //make sure the category_id is valid
        $category = \App\Models\Category::where('id', $request->category_id)->where('type', 'audio')->first();
        if (!$category) {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'Invalid category_id'
                ],
                400
            );
        }

        $audio = \App\Models\Media::where('category_id', $request->category_id)->where('type', 'audio')->get();
        return response()->json(
            [
                'status' => true,
                'data' => $audio
            ],
            200
        );
    }

    //video media category_id
    public function video(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
        ]);

        //make sure the category_id is valid
        $category = \App\Models\Category::where('id', $request->category_id)->where('type', 'video')->first();
        if (!$category) {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'Invalid category_id'
                ],
                400
            );
        }

        $video = \App\Models\Media::where('category_id', $request->category_id)->where('type', 'video')->get();
        return response()->json(
            [
                'status' => true,
                'data' => $video
            ],
            200
        );
    }

    //gallery
    public function gallery(Request $request) {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
        ]);

        //make sure the category_id is valid
        $category = \App\Models\Category::where('id', $request->category_id)->where('type', 'gallery')->first();
        if (!$category) {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'Invalid category_id'
                ],
                400
            );
        }

        $gallery = \App\Models\Gallery::orderBy('created_at', 'desc')
            ->where('category_id', $request->category_id)
            ->get();

        return response()->json(
            [
                'status' => true,
                'data' => $gallery
            ],
            200
        );
    }
}
