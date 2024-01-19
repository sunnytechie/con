<?php

namespace App\Http\Controllers\Api\V23;

use App\Models\User;
use App\Models\Diocese;
use App\Models\Province;
use App\Models\Membership;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function account($user_id) {
        $user = User::find($user_id);

        if ($user) {
            //check membership
            $membership = Membership::where('user_id', $user_id)->first();
            if ($membership) {
                $membership->delete();
            }
            $user->delete();
        }

        else {
            return response()->json([
                'status' => false,
                'message' => "User not found.",
            ]);
        }

        return response()->json([
            'status' => true,
            'message' => "Account diactivated.",
        ]);
    }

    public function userAccount($user_id) {
        $user = User::find($user_id);
        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'User not found.',
            ]);
        }

        $token = $user->remember_token;

        $membership = Membership::where('user_id', $user_id)->first();
        if ($membership) {
            $member_diocese = $membership->diocease;
            $member_province = $membership->province;

            $diocese = Diocese::where('id', $member_diocese)->first();
            if (!$diocese) {
                $diocese = "Nil";
                $diocese_id = "Nil";
            }
            else {
                $diocese_id = $diocese->id;
                $diocese = $diocese->name;
             }
            $province = Province::where('id', $member_province)->first();
            if (!$province) {
                $province = "Nil";
                $province_id = "Nil";
            }
            else {
                $province_id = $province->id;
                $province = $province->name;
            }

            return response()->json([
                'status' => true,
                'membership' => true,
                'diocese' => $diocese,
                'province' => $province,
                'diocese_id' => $diocese_id,
                'province_id' => $province_id,
                'membership_data' => $membership,
                'message' => 'Login Success',
                'user' => $user,
                'token' => $token
            ]);
        }

        return response()->json([
            'status' => true,
            'membership' => false,
            'message' => 'Login Success',
            'user' => $user,
            'token' => $token
        ]);

    }

    
}
