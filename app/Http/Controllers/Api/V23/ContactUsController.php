<?php

namespace App\Http\Controllers\Api\V23;

use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ContactUsController extends Controller
{
    //store
    public function store(Request $request, $user_id)
    {
        //validate request
        $validator = Validator::make($request->all(), [
            'feedback_type' => 'required',
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ]);
        }

        //store data
        $contact = new Feedback();
        $contact->user_id = $user_id;
        $contact->feedback_type = $request->feedback_type;
        $contact->user_fullname = $request->name;
        $contact->user_email = $request->email;
        $contact->feedback_msg = $request->message;

        if ($contact->save()) {
            return response()->json([
                'status' => true,
                'message' => 'Contact us message sent successfully'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong'
            ]);
        }
    }
}
