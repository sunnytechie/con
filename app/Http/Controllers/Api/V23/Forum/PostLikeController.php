<?php

namespace App\Http\Controllers\APi\V23\Forum;

use App\Models\Post;
use App\Models\Postlike;
use App\Models\Likereply;
use App\Models\Likecomment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Postcomment;
use App\Models\Reply;
use App\Models\Savedpost;
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
            ]);
        }

        //check if user has already liked the post
        $like = Postlike::where('user_id', $user_id)->where('post_id', $post_id)->first();
        if($like) {
            //delete the likes and decreement from post like
            $post->decrement('likes');
            $like->delete();

            return response()->json([
                'status' => true,
                'message' => 'Post Unliked.',
            ]);
        }

        //new like
        ////$like = $post->postlikes()->create([
        ////    'user_id' => $user_id,
        ////    'post_id' => $post_id,
        ////]);

        $like = new Postlike();
        $like->user_id = $user_id;
        $like->post_id = $post_id;
        $like->save();

        //increment likes count in post
        $post->increment('likes');

        return response()->json([
            'status' => true,
            'message' => 'Post liked',
        ]);
    }

    //comment
    public function storecommentlike($user_id, $comment_id) {
        $comment = Postcomment::find($comment_id);
        if(!$comment) {
            return response()->json([
                'status' => false,
                'message' => 'Comment does not exist.',
            ]);
        }

        $like = Likecomment::where('postcomment_id', $comment_id)->where('user_id', $user_id)->first();

        if($like) {
            //delete the likes and decreement from post like
            $comment = \App\Models\Postcomment::find($comment_id);
            $comment->decrement('likes');

            //delete like
            $like->delete();

            return response()->json([
                'status' => true,
                'message' => 'Comment Unliked.',
            ]);
        }

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
            'message' => 'Comment liked',
        ]);
    }

    //reply
    public function storereplylike($user_id, $reply_id) {
        $reply = Reply::find($reply_id);
        if(!$reply) {
            return response()->json([
                'status' => false,
                'message' => 'Reply does not exist.',
            ]);
        }

        $like = Likereply::where('user_id', $user_id)->where('reply_id', $reply_id)->first();
        if($like) {
            //delete the likes and decreement from post like
            $reply = \App\Models\Reply::find($reply_id);
            $reply->decrement('likes');

            //delete like
            $like->delete();

            return response()->json([
                'status' => true,
                'message' => 'Reply Unliked.',
            ]);
        }

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
            'message' => 'Reply liked',
            'data' => $reply
        ]);
    }

    //save post
    public function savePost($user_id, $post_id) {
        //check if user has already saved the post
        $saved = Savedpost::where('user_id', $user_id)->where('post_id', $post_id)->first();
        if($saved) {
            return response()->json([
                'status' => true,
                'message' => 'Already saved this post.',
            ]);
        }

        //new saved post
        ////$saved = Savedpost::create([
        ////    'user_id' => $user_id,
        ////    'post_id' => $post_id,
        ////]);
        $saved = new Savedpost();
        $saved->user_id = $user_id;
        $saved->post_id = $post_id;
        $saved->save();

        return response()->json([
            'status' => true,
            'message' => 'Post saved',
        ]);
    }
}
