<?php

namespace App\Http\Controllers\Api\V23\Forum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LikeReplyController extends Controller
{
    //store
    public function store(Request $request, $user_id, $reply_id) {
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
