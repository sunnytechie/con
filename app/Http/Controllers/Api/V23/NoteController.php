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
                'status' => false,
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
            'status' => true,
            'message' => 'Note created',
            'data' => $note
        ], 201);
    }

    //index
    public function index($user_id) {
        //fetch all notes
        $notes = Note::where('user_id', $user_id)->get();

        return response()->json([
            'status' => true,
            'message' => 'Notes',
            'data' => $notes
        ], 200);
    }

    //update
    public function update(Request $request, $id) {
        //validate request
        $validator = Validator::make($request->all(), [
            'tag' => '',
            'title' => '',
            'body' => 'required',
        ]);

        //validate incoming request
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'data' => $validator->errors()
            ], 400);
        }

        $note = Note::find($id);
        if (!$note) {
            return response()->json([
                'status' => false,
                'message' => 'Note not found',
                'data' => '',
            ], 200);
        }

        //update note
        $note->tag = $request->tag;
        $note->title = $request->title;
        $note->body = $request->body;
        $note->save();

        return response()->json([
            'status' => true,
            'message' => 'Note created',
            'data' => $note
        ], 201);
    }

    //delete
    public function destroy($id) {
        $note = Note::find($id);
        if (!$note) {
            return response()->json([
                'status' => false,
                'message' => 'Note not found',
                'data' => '',
            ], 200);
        }

        $note->delete();
        return response()->json([
            'status' => true,
            'message' => 'Note deleted',
            'data' => '',
        ], 200);

    }
}
