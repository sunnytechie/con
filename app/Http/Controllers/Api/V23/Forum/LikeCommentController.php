<?php

namespace App\Http\Controllers\Api\V23\Forum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LikeCommentController extends Controller
{
    //store
    public function update(Request $request, $user_id, $comment_id) {
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
}
