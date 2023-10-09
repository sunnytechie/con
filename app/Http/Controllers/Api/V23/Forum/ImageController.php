<?php

namespace App\Http\Controllers\Api\V23\Forum;

use App\Models\Post;
use App\Models\Postimage;
use App\Models\Membership;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ImageController extends Controller
{
    //store
    public function store(Request $request, $user_id, $post_id) {
        //validate data
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        //validate request
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ]);
        }

        //check if user has membership
        $membership = Membership::where('user_id', $user_id)->first();
        if(!$membership) {
            return response()->json([
                'status' => false,
                'message' => 'User has no membership.',
                'errors' => ''
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

        //check if user is the owner of the post
        if($post->user_id != $user_id) {
            return response()->json([
                'status' => false,
                'message' => 'User is not the owner of the post.',
                'errors' => ''
            ]);
        }

        //random 10 digit number
        $random = mt_rand(1000000000, 9999999999);

        //upload image
        $imageName = $random.time().'.'.$request->image->extension();
        $request->image->move(public_path('postimages'), $imageName);

        //new post image
        $postimage = new Postimage();
        $postimage->post_id = $post_id;
        $postimage->image = $imageName;
        $postimage->save();

        return response()->json([
            'status' => true,
            'message' => 'Post image created successfully',
            'data' => $postimage
        ]);

    }

    //delete
    public function delete($user_id, $post_id, $postimage_id) {
        //check if user has membership
        $membership = Membership::where('user_id', $user_id)->first();
        if(!$membership) {
            return response()->json([
                'status' => false,
                'message' => 'User has no membership.',
                'errors' => ''
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

        //check if user is the owner of the post
        if($post->user_id != $user_id) {
            return response()->json([
                'status' => false,
                'message' => 'User is not the owner of the post.',
                'errors' => ''
            ]);
        }

        //check if post image exist
        $postimage = Postimage::find($postimage_id);
        if(!$postimage) {
            return response()->json([
                'status' => false,
                'message' => 'Post image does not exist.',
                'errors' => ''
            ]);
        }

        //delete post image
        $postimage->delete();

        return response()->json([
            'status' => true,
            'message' => 'Post image deleted successfully',
            'data' => ''
        ]);
    }
}
