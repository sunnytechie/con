<?php

namespace App\Http\Controllers\Api\V23\Auth;

use App\Models\User;
use App\Models\Diocese;
use App\Models\Province;
use App\Models\Membership;
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
            'email' => 'required',
            'google_id' => 'nullable'
        ]);

        //if validation fails
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
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
                'message' => 'User logged in successfully',
                'user' => $user,
                'token' => $token
            ], 200);
        }

        //create user
        $password = 'Conaio'; // Replace this with the actual password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'login_type' => 'google',
            'google_id' => $request->google_id,
            'password' => $hashedPassword,
        ]);


        //create token
        $token = $user->createToken('auth_token')->plainTextToken;
        $user->remember_token = $token;
        $user->save();

        //return response
        return response()->json([
            'status' => true,
            'membership' => false,
            'message' => 'User registered successfully',
            'user' => $user,
            'token' => $token
        ], 201);
    }
}
