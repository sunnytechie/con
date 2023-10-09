<?php

namespace App\Http\Controllers\Api\V23\Forum;

use App\Models\Post;
use App\Models\Postcomment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    //store
    public function store(Request $request, $post_id, $user_id) {
        //validate data
        $validator = Validator::make($request->all(), [
            'content' => 'required',
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

        //new comment
        $comment = new Postcomment();
        $comment->content = $request->content;
        $comment->user_id = $user_id;
        $comment->post_id = $post_id;
        $comment->save();

        //increment comments count in post
        $post->increment('comments');

        return response()->json([
            'status' => true,
            'message' => 'Comment added successfully',
            'data' => $comment
        ]);
    }

    //destroy
    public function destroy($post_id, $comment_id) {
        //check if post exist
        $post = Post::find($post_id);
        if(!$post) {
            return response()->json([
                'status' => false,
                'message' => 'Post does not exist.',
                'errors' => ''
            ]);
        }

        //check if comment exist
        $comment = Postcomment::find($comment_id);
        if(!$comment) {
            return response()->json([
                'status' => false,
                'message' => 'Comment does not exist.',
                'errors' => ''
            ]);
        }

        //delete comment
        $comment->delete();

        //decrement comments count in post
        $post->decrement('comments');

        return response()->json([
            'status' => true,
            'message' => 'Comment deleted successfully',
            'data' => $comment
        ]);
    }
}
