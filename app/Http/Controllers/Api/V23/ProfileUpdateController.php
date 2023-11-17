<?php

namespace App\Http\Controllers\Api\V23;

use App\Models\User;
use App\Models\Membership;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;

class ProfileUpdateController extends Controller
{
    //update profile
    public function update(Request $request, $user_id) {
        //validate request
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|integer',
            'fullname' => 'nullable|string',
            //'email' => 'required|email',
            'phone' => 'nullable|string',
            'birthday' => 'date|nullable',
            'avatar' => 'nullable',
            'province' => 'nullable',
            'diocese' => 'nullable',
        ]);

        //validate request
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ]);
        }

        //check if user exist
        $user = User::find($user_id);
        if(!$user) {
            return response()->json([
                'status' => false,
                'message' => 'User not found',
            ]);
        }

        //random numbers for image name
        $random = rand(1, 1000000000000000000);

        //if request has avatar
        if($request->hasFile('avatar')) {
            //validate image
            $validator = Validator::make($request->all(), [
                'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            //validate image
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Image Validation error',
                    'errors' => $validator->errors()
                ]);
            }

            $image = $request->file('avatar');
            $imageName = time() . $random . '.' . $image->extension();
            $image->move(public_path('uploads/avatars'), $imageName);
        }

        //update user
        $user->name = $request->fullname;
        //$user->email = $request->email;
        $user->phone = $request->phone;
        $user->date_of_birth = $request->birthday;
        if($request->hasFile('avatar')) {
            $user->avatar = $imageName;
        }
        $user->save();

        //check if user exist
        $membership = Membership::where('user_id', $user_id)->first();
        if($membership) {
            //update membership
            $membership->fullname = $request->fullname;
            //$membership->email = $request->email;
            $membership->phone = $request->phone;
            $membership->date_of_birth = $request->birthday;
            if ($request->has('province') || $request->has('diocese')) {
                $membership->province = $request->province;
                $membership->diocease = $request->diocese;
            }
            $membership->save();

            return response()->json([
                'status' => true,
                'message' => 'Profile updated successfully',
                'data' => $membership
            ]);
        }

        return response()->json([
            'status' => true,
            'message' => 'Profile updated successfully',
            'data' => $user
        ]);



    }
}
