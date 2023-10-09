<?php

namespace App\Http\Controllers\Api\V23;

use App\Models\Prayer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PrayerController extends Controller
{
    //store
    public function store(Request $request)
    {
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
                'success' => false,
                'message' => 'Validation error',
                'data' => $validator->errors()
            ], 400);
        }

        $prayer = new Prayer();
        $prayer->fullname = $request->fullname;
        $prayer->email = $request->email;
        $prayer->phone = $request->phone;
        $prayer->title = $request->title;
        $prayer->prayer_request = $request->details;
        ////$prayer->request_response = $request->request_response;
        ////$prayer->deleted = $request->deleted;
        $prayer->save();

        return response()->json([
            'success' => true,
            'message' => 'Prayer created',
            'data' => $prayer
        ], 201);
    }
}
