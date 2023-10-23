<?php

namespace App\Http\Controllers\Api\V23\Forum;

use App\Models\Post;
use App\Models\Membership;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    //index posts with user_id
    public function index($user_id) {
        $user = \App\Models\User::find($user_id);
        //check if user exists
        if(!$user) {
            return response()->json([
                'status' => false,
                'message' => 'User not found.'
            ]);
        }

        //find user membership
        $membership = Membership::where('user_id', $user_id)->first();
        if(!$membership) {
            return response()->json([
                'status' => false,
                'message' => 'User has no membership.'
            ]);
        }

        //get membership province and diocese
        $province = $membership->province;
        $diocese = $membership->diocese;

        //get posts with province and diocese
        $posts = Post::where('province', $province)->where('diocese', $diocese)->get();

        return response()->json([
            'status' => true,
            'message' => 'Posts retrieved successfully',
            'data' => $posts
        ]);
    }

    //store
    public function store(Request $request, $user_id) {
        //validate data
        $validator = Validator::make($request->all(), [
            'content' => 'required',
            //'province' => 'required',
            //'diocese' => 'required',
        ]);

        //validate request
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ]);
        }

        $membership = Membership::where('user_id', $user_id)->first();
        if(!$membership) {
            return response()->json([
                'status' => false,
                'message' => 'User has no membership.',
                'errors' => ''
            ]);
        }

        dd($membership);

        //new post
        $post = new Post();
        $post->user_id = $user_id;
        $post->content = $request->content;
        $post->province = $membership->province;
        $post->diocese = $membership->diocese;
        $post->save();

        //send notification to all users in the same province and diocese
        //user_avatar should be generated from user making the post //Should be a complete url
        //title
        //details
        //user_id
        //province
        //diocese
        //store notification in database
        //send email to all users in the same province and diocese


        return response()->json([
            'status' => true,
            'message' => 'Post created successfully',
            'data' => $post
        ]);

    }

    //update
    public function update(Request $request, $user_id, $post_id) {
        //validate data
        $validator = Validator::make($request->all(), [
            'content' => 'required',
            //'province' => 'required',
            //'diocese' => 'required',
        ]);

        //validate request
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ]);
        }

        $membership = Membership::where('user_id', $user_id)->first();
        if(!$membership) {
            return response()->json([
                'status' => false,
                'message' => 'User has no membership.',
                'errors' => ''
            ]);
        }

        //find post
        $post = Post::find($post_id);
        if(!$post) {
            return response()->json([
                'status' => false,
                'message' => 'Post not found.',
                'errors' => ''
            ]);
        }

        //check if user is the owner of the post
        if($post->user_id != $user_id) {
            return response()->json([
                'status' => false,
                'message' => 'User is not the owner of the post.',
                'errors' => ''
            ]);
        }

        //update post
        $post->content = $request->content;
        //$post->province = $membership->province;
        //$post->diocese = $membership->diocese;
        $post->save();

        return response()->json([
            'status' => true,
            'message' => 'Post updated successfully',
            'data' => $post
        ]);

    }

    //destroy
    public function destroy($user_id, $post_id) {
        //find post
        $post = Post::find($post_id);
        if(!$post) {
            return response()->json([
                'status' => false,
                'message' => 'Post not found.',
                'errors' => ''
            ]);
        }

        //check if user is the owner of the post
        if($post->user_id != $user_id) {
            return response()->json([
                'status' => false,
                'message' => 'User is not the owner of the post.',
                'errors' => ''
            ]);
        }

        //delete post
        $post->delete();

        return response()->json([
            'status' => true,
            'message' => 'Post deleted successfully',
            'data' => $post
        ]);

    }
}
