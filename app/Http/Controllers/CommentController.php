<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //comments
        $comments = Comment::paginate(20);;
        return view('comment.index', compact('comments'));
    }

    //store comment
    public function store(Request $request)
    {
        $comment = new Comment();
        $comment->user_id = $request->user_id;
        $comment->email = $request->email;
        $comment->media_id = $request->media_id;
        $comment->content = $request->content;
        $comment->type = $request->type;
        $comment->edited = $request->edited;
        $comment->deleted = $request->deleted;
        $comment->save();
        return redirect()->back();
    }

    //destroy comment
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return redirect()->back();
    }

    //api store comment
    public function apiStoreComment(Request $request)
    {
        //validate request
        $request->validate([
            'user_id' => '',
            'email' => 'required',
            'media_id' => 'required',
            'content' => 'required',
            'type' => '',
            'edited' => '',
            'deleted' => '',
        ]);

        $comment = new Comment();
        $comment->user_id = $request->user_id;
        $comment->email = $request->email;
        $comment->media_id = $request->media_id;
        $comment->content = $request->content;
        $comment->type = $request->type;
        $comment->edited = $request->edited;
        $comment->deleted = $request->deleted;
        $comment->save();
        return response()->json($comment);
    }
}
