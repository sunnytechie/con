<?php

namespace App\Http\Controllers\Api\V23;

use App\Models\User;
use App\Models\Hymnal;
use Illuminate\Http\Request;
use App\Models\Hymnalpurchase;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class HymnalsController extends Controller
{
    //index
    public function index($user_id)
    {
        //check if user subscribed
        $user = User::find($user_id);
        if (!$user) {
            return response()->json(
                [
                    'status' => false,
                    'message' => "user not found",
                ]
            );
        }

        $checkEmailinHymnal = Hymnalpurchase::where('email', $user->email)->first();
        if ($checkEmailinHymnal) {
            $access = true;
        } else {
            $access = false;
        }

        $hymnals = \App\Models\Hymnal::orderBy('number', 'desc')->get();
        return response()->json(
            [
                'status' => true,
                'access' => $access,
                'data' => $hymnals
            ]
        );
    }

    //search
    public function search(Request $request, $user_id)
    {
        //check if user subscribed
        $user = User::find($user_id);
        if (!$user) {
            return response()->json(
                [
                    'status' => false,
                    'message' => "user not found",
                ]
            );
        }

        $checkEmailinHymnal = Hymnalpurchase::where('email', $user->email)->first();
        if ($checkEmailinHymnal) {
            $access = true;
        } else {
            $access = false;
        }

        $validate = Validator::make($request->all(), [
            'title' => 'required'
        ]);

        if ($validate->fails()) {
            return response()->json(
                [
                    'status' => false,
                    'message' => $validate->errors()->first()
                ]
            );
        }

        //$hymnals = \App\Models\Hymnal::Where('title', 'like', '%' . $request->title . '%')
        //    ->orWhere('number', 'like', '%' . $request->title . '%')
        //    ->orderBy('number', 'asc')
        //    ->get();

        $hymnals = Hymnal::search($request->title)->get();

        return response()->json(
            [
                'status' => true,
                'access' => $access,
                'data' => $hymnals
            ]
        );
    }

    //filter
    public function filter(Request $request, $user_id)
    {
        //check if user subscribed
        $user = User::find($user_id);
        if (!$user) {
            return response()->json(
                [
                    'status' => false,
                    'message' => "user not found",
                ]
            );
        }

        $checkEmailinHymnal = Hymnalpurchase::where('email', $user->email)->first();
        if ($checkEmailinHymnal) {
            $access = true;
        } else {
            $access = false;
        }

        $validate = Validator::make($request->all(), [
            'number' => 'required',
            'title' => 'required'
        ]);

        if ($validate->fails()) {
            return response()->json(
                [
                    'status' => false,
                    'message' => $validate->errors()->first()
                ]
            );
        }

        $hymnals = \App\Models\Hymnal::Where('number', 'like', '%' . $request->number . '%')
            ->orWhere('title', 'like', '%' . $request->title . '%')
            ->orderBy('number', 'asc')
            ->get();

        return response()->json(
            [
                'status' => true,
                'access' => $access,
                'data' => $hymnals
            ]
        );
    }

    //sucbscribe
    public function subscribe(Request $request, $user_id)
    {
        //validate request
        $validate = Validator::make($request->all(), [
            'transaction_ref' => 'required',
            'price' => 'required',
        ]);

        if($validate->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'data' => $validate->errors()
            ], 400);
        }

        //make sure user exits
        $user = User::find($user_id);
        if(!$user) {
            return response()->json([
                'status' => false,
                'message' => 'User not found',
            ], 404);
        }

        ////check if $user-email exists with bcp_id in purchased_bcps table
        $purchasedBcp = new Hymnalpurchase(); ////If an error happens just recreate another model for this.
        $purchasedBcp->email = $user->email;
        $purchasedBcp->price = $request->price;
        $purchasedBcp->transaction_ref = $request->transaction_ref;
        $purchasedBcp->transaction_status = 'success';
        $purchasedBcp->save();

        return response()->json([
            'status' => true,
            'message' => 'Subscribed successfully',
        ], 200);
    }

    public function checkAccess($user_id) {
        //check if user subscribed
        $user = User::find($user_id);
        if (!$user) {
            return response()->json(
                [
                    'status' => false,
                    'message' => "user not found",
                ]
            );
        }

        $checkEmailinHymnal = Hymnalpurchase::where('email', $user->email)->first();
        if ($checkEmailinHymnal) {
            $access = true;
        } else {
            $access = false;
        }

        return response()->json([
            'status' => true,
            'access' => $access,
        ]);
    }
}
