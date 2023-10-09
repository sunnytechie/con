<?php

namespace App\Http\Controllers\Api\V23\Forum;

use App\Models\Membership;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class MembershipController extends Controller
{
    //Check if user exist in the membership table
    public function checkUserInMembership($user_id) {
        $membership = Membership::where('user_id', $user_id)->first();
        if($membership) {
            return response()->json([
                'status' => 'success',
                'message' => 'User has membership.',
                'data' => $membership
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'User has no membership.',
                'data' => ''
            ]);
        }
    }

    //update membership
    public function update(Request $request, $user_id) {
        //validate request
        $validator = Validator::make($request->all(), [
            'fullname' => 'required',
            //'email' => 'required|email',
            'phone' => 'required',
            'birthday' => 'required'
        ]);

        //validate request
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ]);
        }

        //check if user exist
        $membership = Membership::where('user_id', $user_id)->first();
        if(!$membership) {
            return response()->json([
                'status' => 'error',
                'message' => 'User does not exist.',
                'errors' => ''
            ]);
        }

        //update membership
        $membership->fullname = $request->fullname;
        //$membership->email = $request->email;
        $membership->phone = $request->phone;
        $membership->birthday = $request->birthday;
        $membership->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Membership updated successfully',
            'data' => $membership
        ]);

    }
}
