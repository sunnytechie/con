<?php

namespace App\Http\Controllers\Api\Auth;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;

class GoogleLoginController extends Controller
{
    public function gooleLoginApi(Request $request) {
        $input = $request->all();

        $findUser = User::where('email', $input['email'])->first();
      
           if($findUser){
            $findUserId = $findUser->id;
               $user = User::where('id', $findUserId)->first();
               return response()->json([
                'message' => 'Successfully logged in',
                 'user' => $user,
                 'status' => 1
                ], 
                 200);
           }else{
               $newUser = User::create([
                   'name' => $input['name'],
                   'email' => $input['email'],
                   'password' => Hash::make('@12340987#'),
                   'login_type' => "Google",
                   'email_verified_at' => now(),
               ]);
               
               $findUserId = $newUser->id;
               //dd($findUserId);
               $user = User::where('id', $findUserId)->first();
               return response()->json([
                'message' => 'Successfully logged in', 
                'user' => $user,
                'status' => 1
            ], 
                200);
           }

    }
}
