<?php

namespace App\Http\Controllers\Api\V23\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class GoogleLoginController extends Controller
{
    //Google Login
    public function gooleLoginApi(Request $request)
    {
        //validate data
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users',
            'google_id' => 'required'
        ]);

        //if validation fails
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first()
            ], 400);
        }

        //check if user already exists
        //$user = User::where('google_id', $request->google_id)->first(); //this may be needed later
        $user = User::where('email', $request->email)->first();

        //if user exists
        if ($user) {
            //update user
            $user->update([
                'name' => $request->name,
                'login_type' => 'google',
                'google_id' => $request->google_id
            ]);

            //create token
            $token = $user->createToken('auth_token')->plainTextToken;
            $user->remember_token = $token;
            $user->save();

            //return response
            return response()->json([
                'success' => true,
                'message' => 'User logged in successfully',
                'data' => [
                    'user' => $user,
                    'token' => $token
                ]
            ], 200);
        }

        //create user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'login_type' => 'google',
            'google_id' => $request->google_id
        ]);

        //create token
        $token = $user->createToken('auth_token')->plainTextToken;
        $user->remember_token = $token;
        $user->save();

        //return response
        return response()->json([
            'success' => true,
            'message' => 'User registered successfully',
            'data' => [
                'user' => $user,
                'token' => $token
            ]
        ], 201);
    }
}
