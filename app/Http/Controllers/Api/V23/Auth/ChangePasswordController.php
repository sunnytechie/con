<?php

namespace App\Http\Controllers\Api\V23\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ChangePasswordController extends Controller
{
    //verify old password
    public function verifyOldPassword(Request $request, $user_id)
    {
        //validate request
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ]);
        }

        $user = User::find($user_id);
        if ($user) {
            if (Hash::check($request->old_password, $user->password)) {
                return response()->json([
                    'status' => true,
                    'message' => 'Old password matched'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Old password not matched'
                ]);
            }
        } else {
            return response()->json([
                'status' => false,
                'message' => 'User not found'
            ]);
        }
    }

    //change password
    public function changePassword(Request $request, $user_id)
    {
        //validate request
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required|same:new_password',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ]);
        }

        $user = User::find($user_id);
        if ($user) {
            if (Hash::check($request->old_password, $user->password)) {
                $user->password = Hash::make($request->new_password);
                $user->save();
                return response()->json([
                    'status' => true,
                    'message' => 'Password changed successfully'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Old password not matched'
                ]);
            }
        } else {
            return response()->json([
                'status' => false,
                'message' => 'User not found'
            ]);
        }
    }
}
