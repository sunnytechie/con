<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //donations
        $donations = Donation::all();
        return view('donation.index', compact('donations'));
    }

    //store the donation
    public function store(Request $request)
    {
        //validate the data
        $this->validate($request, [
            'name' => 'required',
            'email' => 'email',
            'currency' => 'required',
            'amount' => 'required',
            'reason' => '',
            'method' => 'required',
            'reference' => '',
            'province' => 'required',
            'diocese' => 'required',
        ]);

        //create a new donation
        $donation = new Donation;
        $donation->name = $request->name;
        $donation->email = $request->email;
        $donation->currency = $request->currency;
        $donation->amount = $request->amount;
        $donation->reason = $request->reason;
        $donation->method = $request->method;
        $donation->reference = $request->reference;
        $donation->province = $request->province;
        $donation->diocese = $request->diocese;
        $donation->deleted = false;
        $donation->save();

        return back()->with('success', 'Thank you for your donation!');
    }
}
