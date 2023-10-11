<?php

namespace App\Http\Controllers\Api\V23\Auth;

use App\Models\User;
use App\Mail\OtpMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class VerifyEmailController extends Controller
{
    //resend otp
    public function resendOtp(Request $request)
    {
        //validate data
        $validator = Validator::make($request->all(), [
            'email' => 'required|email'
        ]);

        //if validation fails
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first()
            ], 400);
        }

        //get user
        $user = User::where('email', $request->email)->first();

        //if user not found
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User not found'
            ], 404);
        }

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
            'message' => 'Verification code sent to email'
        ]);
    }
}
