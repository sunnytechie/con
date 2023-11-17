<?php

namespace App\Http\Controllers\Api\V23;

use App\Models\User;
use App\Models\Diocese;
use App\Models\Province;
use App\Models\Membership;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

        $membership = Membership::where('user_id', $user_id)->first();
        if ($membership) {
            $member_diocese = $membership->diocease;
            $member_province = $membership->province;

            $diocese = Diocese::where('id', $member_diocese)->first()->name;
            $province = Province::where('id', $member_province)->first()->name;
            return response()->json([
                'status' => true,
                'diocese' => $diocese,
                'province' => $province,
                'user' => $user,
                'membership' => true,
                'membership' => $membership,
            ]);
        }

        return response()->json([
            'membership' => false,
            'status' => true,
            'user' => $user,
        ]);

    }
}
