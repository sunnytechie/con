<?php

namespace App\Http\Controllers\Api\V23\Forum;

use App\Models\Post;
use App\Models\Reply;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ReplyController extends Controller
{
    //store
    public function store(Request $request, $post_id, $postcomment_id, $user_id) {
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

        //check if postcomment exist
        $postcomment = $post->postcomments()->find($postcomment_id);
        if(!$postcomment) {
            return response()->json([
                'status' => false,
                'message' => 'Post comment does not exist.',
                'errors' => ''
            ]);
        }

        //new reply
        $reply = new Reply();
        $reply->content = $request->content;
        $reply->user_id = $user_id;
        $reply->post_id = $post_id;
        $reply->postcomment_id = $postcomment_id;
        $reply->save();

        //increment replies count in postcomment
        //$postcomment->increment('replies');

        return response()->json([
            'status' => true,
            'message' => 'Reply added successfully',
            'data' => $reply
        ]);
    }

    //destroy
    public function destroy($post_id, $postcomment_id, $reply_id) {
        //check if post exist
        $post = Post::find($post_id);
        if(!$post) {
            return response()->json([
                'status' => false,
                'message' => 'Post does not exist.',
                'errors' => ''
            ]);
        }

        //check if postcomment exist
        $postcomment = $post->postcomments()->find($postcomment_id);
        if(!$postcomment) {
            return response()->json([
                'status' => false,
                'message' => 'Post comment does not exist.',
                'errors' => ''
            ]);
        }

        //check if reply exist
        $reply = $postcomment->replies()->find($reply_id);
        if(!$reply) {
            return response()->json([
                'status' => false,
                'message' => 'Reply does not exist.',
                'errors' => ''
            ]);
        }

        //delete reply
        $reply->delete();

        //decrement replies count in postcomment
        //$postcomment->decrement('replies');

        return response()->json([
            'status' => true,
            'message' => 'Reply deleted successfully',
            'data' => $reply
        ]);
    }
}
