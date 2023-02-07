<?php

namespace App\Http\Controllers\Api;

use App\Models\Otp;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VerifyEmailController extends Controller
{
    //api verify email with token
    public function verify(Request $request)
    {
        //validate incoming request
        $this->validate($request, [
            'email' => 'required|string',
            'token' => 'required|string',
        ]);

        //count the number of tokens for this email
        $countOtp = Otp::where('email', $request->email)
        ->where('token', $request->token)
        ->count();

        if ($countOtp == 0) {
            //status 0 means email is not verified
            $status = 0;
            return response()->json([
                'message' => 'Invalid token',
                'status' => $status

            ], 400);
        }

        //check if the email has this token
        $otp = Otp::where('email', $request->email)
        ->where('token', $request->token)
        ->first();
        
        //check if token is lasted more than 24 hours
        if ($otp->created_at->diffInHours(now()) > 24) {
            //delete the token
            $otp->delete();

            //status 0 means email is not verified
            $status = 0;
            return response()->json([
                'message' => 'Token is expired',
                'status' => $status

            ], 400);
        }

        //if the email has this token
        if ($otp) {
            //update the user email_verified_at
            $user = User::where('email', $request->email)->first();
            $user->email_verified_at = now();
            $user->save();
            //delete the token
            $otp->delete();
            
            //status 1 means email is verified
            $status = 1;
            return response()->json([
                'message' => 'Email verified successfully',
                'status' => $status
            ], 200);
        }

       
    }
}