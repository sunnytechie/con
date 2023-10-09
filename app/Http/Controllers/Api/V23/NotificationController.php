<?php

namespace App\Http\Controllers\Api\V23;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    //index
    public function index($user_id) {
        $user = \App\Models\User::find($user_id);
        //check if user exists
        if(!$user) {
            return response()->json([
                'status' => false,
                'message' => 'User not found.'
            ]);
        }

        //find user membership
        $membership = \App\Models\Membership::where('user_id', $user_id)->first();
        if(!$membership) {
            return response()->json([
                'status' => false,
                'message' => 'You have no membership.'
            ]);
        }

        //get membership province and diocese
        $province = $membership->province;
        $diocese = $membership->diocese;

        //get notifications with province and diocese
        $notifications = \App\Models\Notification::where('province', $province)->where('diocese', $diocese)->get();

        return response()->json([
            'status' => true,
            'message' => 'Notifications retrieved successfully',
            'data' => $notifications
        ]);
    }
}
