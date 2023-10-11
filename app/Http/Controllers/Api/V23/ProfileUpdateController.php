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
    //update membership
    public function update(Request $request, $user_id) {
        //validate request
        $validator = Validator::make($request->all(), [
            'fullname' => 'nullable|string',
            //'email' => 'required|email',
            'phone' => 'nullable|string',
            'birthday' => 'date|nullable',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        //validate request
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ]);
        }

        //check if user exist
        $user = User::find($user_id);
        if(!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'User not found',
            ]);
        }

        //if request has avatar
        if($request->hasFile('avatar')) {
            //get file
            $file = $request->file('avatar');
            //get file name
            $filename = $file->getClientOriginalName();
            $imagePath = request('image')->store('profile/images', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
            $image->save();
        }

        //update user
        $user->fullname = $request->fullname;
        //$user->email = $request->email;
        $user->phone = $request->phone;
        $user->birthday = $request->birthday;
        if($request->hasFile('avatar')) {
            $user->avatar = $imagePath;
        }
        $user->save();

        //check if user exist
        $membership = Membership::where('user_id', $user_id)->first();
        if($membership) {
            //update membership
            $membership->fullname = $request->fullname;
            //$membership->email = $request->email;
            $membership->phone = $request->phone;
            $membership->birthday = $request->birthday;
            $membership->save();
        }



        return response()->json([
            'status' => 'success',
            'message' => 'Membership updated successfully',
            'data' => $membership
        ]);
    }
}
