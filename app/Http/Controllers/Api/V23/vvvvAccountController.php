<?php

namespace App\Http\Controllers\Api\V23;

use App\Http\Controllers\Controller;
use App\Models\Membership;
use App\Models\User;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function account($user_id) {
        $user =User::find($user_id);

        if ($user) {
            //check membership
            $membership = Membership::where('user_id', $user_id)->first();
            if ($membership) {
                $membership->delete();
            }
            $user->delete();
        }
    }
}
