<?php

namespace App\Http\Controllers\Api;

use App\Models\Otp;
use App\Models\User;
use App\Mail\VerifyEmail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class SendVerificationTokenToEmailController extends Controller
{
    //api to get verification token
    public function sendVerificationTokenToEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        //dd($request->email);

        $user = User::where('email', $request->email)->first();

        if ($user->hasVerifiedEmail()) {
            return response()->json([
                'message' => 'Email already verified'
            ], 400);
        }
        //generate 5 digit token
        $token = mt_rand(100000, 999999);
        $email = $user->email;

        Mail::to($request->email)->send(new VerifyEmail($token, $email));

        //Save the token to the database
        Otp::create([
            'token' => $token,
            'email' => $email,
        ]);

        return response()->json([
            'message' => 'Verification code sent to your email'
        ]);
    }
}