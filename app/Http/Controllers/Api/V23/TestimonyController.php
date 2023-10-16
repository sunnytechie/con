<?php

namespace App\Http\Controllers\Api\V23;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Testimony;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class TestimonyController extends Controller
{
    //store
    public function store(Request $request, $user_id)
    {
        //validate incoming request
        $validator = Validator::make($request->all(), [
            'fullname' => 'required',
            'title' => 'required',
            'details' => 'required',
        ]);

        //validate incoming request
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'data' => $validator->errors()
            ], 400);
        }

        $user = User::find($user_id);
        if (!$user) {
            return response()->json([
                'status' => true,
                'message' => 'User not found',
            ], 200);
        }

        $testimony = new Testimony();
        $testimony->user_id = $user_id;
        $testimony->email = $user->email;
        $testimony->fullname = $request->fullname;
        $testimony->title = $request->title;
        $testimony->body = $request->details;
        $testimony->save();

        return response()->json([
            'status' => true,
            'message' => 'Testimony submitted successfully',
            'data' => $testimony
        ], 201);
    }

    //index
    public function index()
    {
        //fetch all testimonies
        $testimonies = Testimony::all();

        return response()->json([
            'status' => true,
            'message' => 'Testimonies',
            'data' => $testimonies
        ], 200);
    }
}
