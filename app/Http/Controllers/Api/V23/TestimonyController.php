<?php

namespace App\Http\Controllers\Api\V23;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Testimony;
use Illuminate\Support\Facades\Validator;

class TestimonyController extends Controller
{
    //store
    public function store(Request $request)
    {
        //validate incoming request
        $validator = Validator::make($request->all(), [
            'fullname' => 'required',
            'email' => 'required',
            'phone' => 'required',
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

        $prayer = new Testimony();
        $prayer->fullname = $request->fullname;
        $prayer->email = $request->email;
        $prayer->phone = $request->phone;
        $prayer->title = $request->title;
        $prayer->body = $request->details;
        $prayer->save();

        return response()->json([
            'status' => true,
            'message' => 'Prayer submitted successfully',
            'data' => $prayer
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
