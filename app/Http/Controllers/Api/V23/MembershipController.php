<?php

namespace App\Http\Controllers\Api\V23;

use App\Models\User;
use App\Models\Province;
use App\Models\Membership;
use Illuminate\Http\Request;
use App\Mail\NewUserloginMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class MembershipController extends Controller
{
    public function store(Request $request, $user_id) {
        //validate incoming request
        $validator = Validator::make($request->all(), [
            'fullname' => 'required',
            'email' => 'nullable',
            'email2' => 'required',
            'phone' => 'required',
            'birthday' => 'required',
            'address' => 'required', //street
            'city' => 'required',
            'state' => 'required',
            'province' => 'required',
            'diocese' => 'required',
            'church_address' => 'required', //church_address
        ]);

        //if validation fails
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first()
            ], 400);
        }

        //find user
        $user = User::find($user_id);
        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'Please try again, userID not found',
            ], 400);
        }

        //check if second exists in membership table on the email column
        $membership = Membership::where('email', $request->email2)->first();

        //if membership exists
        if ($membership) {
            return response()->json([
                'status' => false,
                'message' => 'Already a registered member, thank you.'
            ], 400);
        }

        //check email in users table
        $checkEmailinUSerDb = User::where('email', $request->email2)->first();
        if (!$checkEmailinUSerDb) {
            //generate 6 character password
            $password = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789') , 0, 6);
            //create user
            $newuser = new User();
            $newuser->name = $request->fullname;
            $newuser->email = $request->email2;
            $newuser->password = bcrypt($password);
            $newuser->login_type = 'email';
            $newuser->email_verified_at = now();
            $newuser->save();

            //send user login details to email
            $email = $request->email2;
            $name = $user->name;
            $password = $password;

            //send email with high priority
            Mail::to($email)->queue(new NewUserloginMail($name, $email, $password));

            //get user id
            $member_user_id = $newuser->id;
        } else {
            //get user id
            $member_user_id = $checkEmailinUSerDb->id;
        }

        //create membership
        $membership = new Membership();
        $membership->user_id = $member_user_id;
        $membership->fullname = $request->fullname;
        $membership->email = $request->email2;
        //$membership->email2 = $request->email2;
        $membership->phone = $request->phone;
        $membership->date_of_birth = $request->birthday;
        $membership->street = $request->address;
        $membership->city = $request->city;
        $membership->state = $request->state;
        $membership->province = $request->province;
        $membership->diocease = $request->diocese;
        $membership->local_church_address = $request->church_address;
        $membership->save();

        //return response
        return response()->json([
            'status' => true,
            'message' => 'Membership created successfully',
            'data' => $membership
        ], 201);
    }

    //province and it diocese
    public function provinceDiocese() {
        $provinces = Province::with('dioceses')->get();

        //return response
        return response()->json([
            'status' => true,
            'message' => 'Province and Diocese',
            'data' => $provinces
        ], 200);

    }

    public function statusCheck($user_id) {
        //check if user exists in membership table
        $membership = Membership::where('user_id', $user_id)->first();

        //if user exists
        if ($membership) {
            return response()->json([
                'status' => true,
                'message' => 'You are a member',
                'data' => $membership
            ], 200);
        }

        //return response
        return response()->json([
            'status' => false,
            'message' => 'You are not a member'
        ], 404);
    }
}
