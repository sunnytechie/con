<?php

namespace App\Http\Controllers\Api\V23\Forum;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SavedPostController extends Controller
{
    //index
    public function index($user_id){
        $posts = Post::with('user.membership', 'postimages', 'postcomments.user', 'postcomments.replies.user')
        ->where('id', function ($query) use ($user_id) {
            $query->select('post_id')
                ->from('savedposts')
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
