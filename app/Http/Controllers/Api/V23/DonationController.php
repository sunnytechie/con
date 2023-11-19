<?php

namespace App\Http\Controllers\Api\V23;

use App\Models\Donation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class DonationController extends Controller
{
    //store
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'email',
            'phone' => 'required',
            'donation_type' => 'required', // 'one-time' or 'recurring
            'description' => 'nullable', // 'tithe', 'offering', 'other'
            'currency' => 'required',
            'amount' => 'required',
            'method' => 'nullable',
            'reference' => 'nullable',
            'province' => 'required',
            'diocese' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ]);
        }

        //create a new donation
        $donation = new Donation;
        $donation->name = $request->name;
        $donation->email = $request->email;
        $donation->phone = $request->phone;
        $donation->donation_type = $request->donation_type;
        $donation->description = $request->description;
        $donation->currency = $request->currency;
        $donation->amount = $request->amount;
        $donation->method = $request->method;
        $donation->reference = $request->reference;
        //$donation->province = $request->province;
        //$donation->diocese = $request->diocese;
        $donation->province_id = $request->province;
        $donation->diocese_id = $request->diocese;
        $donation->deleted = false;
        $donation->save();

        return response()->json([
            'status' => true,
            'message' => 'Thank you for your donation!'
        ]);

    }
}
