<?php

namespace App\Http\Controllers\Api\V23\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
                'success' => false,
                'message' => $validator->errors()->first()
            ], 400);
        }

        //check user
        $user = User::where('email', $request->email)->first();

        //check password
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid Credentials'
            ], 401);
        }

        //check email verified
        if (!$user->hasVerifiedEmail()) {
            return response()->json([
                'success' => false,
                'message' => 'Email not verified'
            ], 401);
        }

        //create token
        $token = $user->createToken('auth_token')->plainTextToken;

        //user details
        $user = User::where('email', $request->email)->first();
        $user->remember_token = $token;
        $user->save();

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Login Success',
            'user' => $user,
            'token' => $token
        ], 200);
    }
}
