<?php

namespace App\Http\Controllers\Api\V23\Auth;

use App\Models\User;
use App\Mail\OtpMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ForgotPasswordController extends Controller
{
    //send otp to email
    public function sendOtp(Request $request)
    {
        //validate data
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users'
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

        //if user not found
        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'Email not found'
            ], 404);
        }

        //generate 4 digit otp
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
            'status' => true,
            'message' => 'Otp sent to email'
        ], 200);
    }

    //verify otp
    public function verifyOtp(Request $request)
    {
        //validate data
        $validator = Validator::make($request->all(), [
            'otp' => 'required|numeric',
            'email' => 'required|email|exists:users'
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

        //if user not found
        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'Email not found'
            ], 404);
        }

        //check otp
        if ($request->otp != $user->user_otp) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid Otp'
            ], 401);
        }

        // if otp is correct then update otp to null
        $user->user_otp = null;
        $user->save();

        //if opt is 30 minutes old then return error
        if ($user->updated_at->diffInMinutes() > 30) {
            return response()->json([
                'status' => false,
                'message' => 'Otp expired'
            ], 401);
        }

        //return response
        return response()->json([
            'status' => true,
            'message' => 'Otp verified'
        ], 200);
    }

    //new password
    public function newPassword(Request $request)
    {
        //validate data
        $validator = Validator::make($request->all(), [
            'password' => 'required|min:6',
            'email' => 'required|email|exists:users'
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

        //if user not found
        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'Email not found'
            ], 404);
        }

        //update password
        $user->password = bcrypt($request->password);
        $user->save();

        //return response
        return response()->json([
            'status' => true,
            'message' => 'Password updated'
        ], 200);
    }
}
