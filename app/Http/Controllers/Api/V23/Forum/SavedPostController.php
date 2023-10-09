<?php

namespace App\Http\Controllers\Api\V23\Forum;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SavedPostController extends Controller
{
    //store
    public function store(Request $request, $post_id) {
        //validate data
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
        ]);

        //validate request
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ]);
        }

        //check if post exist
        $post = Post::find($post_id);
        if(!$post) {
            return response()->json([
                'status' => false,
                'message' => 'Post does not exist.',
                'errors' => ''
            ]);
        }

        //check if user has already saved the post
        $saved = $post->savedposts()->where('user_id', $request->user_id)->first();
        if($saved) {
            return response()->json([
                'status' => false,
                'message' => 'User has already saved this post.',
                'errors' => ''
            ]);
        }

        //new saved post
        $saved = $post->savedposts()->create([
            'user_id' => $request->user_id,
            'post_id' => $post_id,
        ]);

        //increment saved count in post
        //$post->increment('saved');

        return response()->json([
            'status' => true,
            'message' => 'Post saved successfully',
            'data' => $post
        ]);
    }
}
