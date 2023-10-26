<?php

namespace App\Http\Controllers\APi\V23\Forum;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PostLikeController extends Controller
{
    //store
    public function store($user_id, $post_id) {

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
        $like = $post->postlikes()->where('user_id', $user_id)->first();
        if($like) {
            //delete the likes and decreement from post like
            $post->decrement('likes');
            $like->delete();

            return response()->json([
                'status' => true,
                'message' => 'Post Unliked.',
                'errors' => ''
            ]);
        }

        //new like
        $like = $post->postlikes()->create([
            'user_id' => $user_id,
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

    //comment
    public function storecommentlike(Request $request, $user_id, $comment_id) {
        //new like
        $like = new \App\Models\Likecomment();
        $like->user_id = $user_id;
        $like->postcomment_id = $comment_id;
        $like->save();

        //increment likes count in comment
        $comment = \App\Models\Postcomment::find($comment_id);
        $comment->increment('likes');

        return response()->json([
            'status' => true,
            'message' => 'Comment liked successfully',
            'data' => $comment
        ]);
    }

    //reply
    public function storereplylike(Request $request, $user_id, $reply_id) {
        //new like
        $like = new \App\Models\Likereply();
        $like->user_id = $user_id;
        $like->reply_id = $reply_id;
        $like->save();

        //increment likes count in reply
        $reply = \App\Models\Reply::find($reply_id);
        $reply->increment('likes');

        return response()->json([
            'status' => true,
            'message' => 'Reply liked successfully',
            'data' => $reply
        ]);
    }
}
