<?php

namespace App\Http\Controllers\Api\V23\Forum;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class LikeController extends Controller
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

        //check if user has already liked the post
        $like = $post->likes()->where('user_id', $request->user_id)->first();
        if($like) {
            return response()->json([
                'status' => false,
                'message' => 'User has already liked the post.',
                'errors' => ''
            ]);
        }

        //new like
        $like = $post->likes()->create([
            'user_id' => $request->user_id,
            'post_id' => $post_id,
        ]);

        //increment likes count in post
        $post->increment('likes');

        return response()->json([
            'status' => true,
            'message' => 'Post liked successfully',
            'data' => $post
        ]);
    }
}
