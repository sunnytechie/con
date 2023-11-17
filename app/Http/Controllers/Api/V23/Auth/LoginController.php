<?php

namespace App\Http\Controllers\Api\V23\Auth;

use App\Models\User;
use App\Models\Membership;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Diocese;
use App\Models\Province;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    //login email and password
    public function loginApi(Request $request)
    {
        //validate data
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users',
            'password' => 'required'
        ]);

        //if validation fails
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first()
            ], 400);
        }

        //check user
        $user = User::where('email', $request->email)->first();

        //check password
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid Credentials'
            ], 401);
        }

        //check email verified
        if (!$user->hasVerifiedEmail()) {
            return response()->json([
                'status' => false,
                'message' => 'Email not verified'
            ], 401);
        }

        //create token
        $token = $user->createToken('auth_token')->plainTextToken;

        //user details
        $user = User::where('email', $request->email)->first();
        $user->remember_token = $token;
        $user->save();

        //check user in memebership
        $membership = Membership::where('user_id', $user->id)->first();

        //if user exists
        if ($membership) {
            $member_diocese = $membership->diocease;
            $member_province = $membership->province;

            $diocese = Diocese::where('id', $member_diocese)->first();
            if (!$diocese) {
                $diocese = "Nil";
            } else { $diocese = $diocese->name; }
            $province = Province::where('id', $member_province)->first();
            if (!$province) {
                $province = "Nil";
            } else { $province = $province->name; }

            return response()->json([
                'status' => true,
                'membership' => true,
                'diocese' => $diocese,
                'province' => $province,
                'membership_data' => $membership,
                'message' => 'Login Success',
                'user' => $user,
                'token' => $token
            ], 200);
        }

        //return response
        return response()->json([
            'status' => true,
            'membership' => false,
            'message' => 'Login Success',
            'user' => $user,
            'token' => $token
        ], 200);
    }
}
