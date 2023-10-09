<?php

namespace App\Http\Controllers\Api\V23;

use App\Models\Note;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class NoteController extends Controller
{
    //store
    public function store(Request $request, $user_id) {
        //validate request
        $validator = Validator::make($request->all(), [
            'tag' => '',
            'title' => '',
            'body' => 'required',
        ]);

        //validate incoming request
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'data' => $validator->errors()
            ], 400);
        }

        //create note
        $note = new Note();
        $note->user_id = $user_id;
        $note->tag = $request->tag;
        $note->title = $request->title;
        $note->body = $request->body;
        $note->save();

        return response()->json([
            'success' => true,
            'message' => 'Note created',
            'data' => $note
        ], 201);
    }

    //index
    public function index($user_id) {
        //fetch all notes
        $notes = Note::where('user_id', $user_id)->get();

        return response()->json([
            'success' => true,
            'message' => 'Notes',
            'data' => $notes
        ], 200);
    }
}
