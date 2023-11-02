<?php

namespace App\Http\Controllers\Api\V23;

use App\Models\User;
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
}
