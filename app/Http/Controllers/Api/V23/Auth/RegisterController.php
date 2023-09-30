<?php

namespace App\Http\Controllers\Api\V23\Auth;

use App\Models\User;
use App\Mail\OtpMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    //register user name, email, password
    public function registerApi(Request $request)
    {
        //validate data
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required'
        ]);

        //if validation fails
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first()
            ], 400);
        }

        //create user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'login_type' => 'email',
            'password' => Hash::make($request->password)
        ]);

        //create token
        $token = $user->createToken('auth_token')->plainTextToken;

        //Otp
        $otp = mt_rand(1000, 9999);

        //update otp
        $user->user_otp = $otp;
        $user->save();

        //send otp to email
        $recipient = $user->email;

        //send email with high priority
        Mail::to($recipient)->queue(new OtpMail($otp));

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Verification code sent to email',
            'token' => $token
        ], 200);
    }

    //verify otp
    public function verifyOtp(Request $request)
    {
        //validate data
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users',
            'otp' => 'required'
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

        //if user not found
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Email not found'
            ], 404);
        }

        //check otp
        if ($user->user_otp != $request->otp) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid otp'
            ], 401);
        }

        //update otp
        $user->user_otp = null;
        $user->email_verified_at = now();
        $user->save();

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Email verified',
            'user' => $user,
        ], 200);
    }
}
