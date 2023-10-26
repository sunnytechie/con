<?php

namespace App\Http\Controllers\Api\V23\Forum;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class LikeController extends Controller
{
    //index
    public function index($user_id){
        $posts = Post::with('user.membership', 'postimages', 'postcomments.user', 'postcomments.replies.user')
        ->where('id', function ($query) use ($user_id) {
            $query->select('post_id')
                ->from('postlikes')
                ->where('user_id', $user_id);
        })
        ->get();

        //check likes on post, comments and replies
        $posts->each(function ($post) use ($user_id) {
            $post->liked = $post->postlikes()->where('user_id', $user_id)->exists();

            // Loop through the comments and add a 'liked' key to each comment indicating if the current user has liked it
            $post->postcomments->each(function ($comment) use ($user_id) {
                $comment->liked = $comment->likecomments()->where('user_id', $user_id)->exists();

                // Loop through the replies and add a 'liked' key to each reply indicating if the current user has liked it
                $comment->replies->each(function ($reply) use ($user_id) {
                    $reply->liked = $reply->likereplies()->where('user_id', $user_id)->exists();
                });
            });
        });

        return response()->json([
            'status' => true,
            'message' => 'Posts saved by the user retrieved successfully',
            'data' => $posts
        ]);
    }

    
}
