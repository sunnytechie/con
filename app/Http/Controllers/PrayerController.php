<?php

namespace App\Http\Controllers;

use App\Mail\prayerMail;
use App\Models\Prayer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PrayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prayers = Prayer::paginate(10);;
        return view('prayer.index', compact('prayers'));
    }

    public function show($prayer) {
        $prayer = Prayer::find($prayer);
        
        $prayerID = $prayer->id;
        $prayerEmail = $prayer->email;
        $prayerTitle = $prayer->title;
        $prayerRequest = $prayer->prayer_request;
        $fullName = $prayer->fullname;

        return view('prayer.show', compact('prayerID', 'prayerEmail', 'prayerTitle', 'prayerRequest', 'fullName'));
    }

    public function email(Request $request) {
        //Validate the request...
        $this->validate($request, [
            'subject' => 'required',
            'email' => 'required',
            'username' => 'required',
            'message' => 'required',
        ]);

        //dd($request->all());

        $subject = $request->subject;
        $message = $request->message;
        $email = $request->email;
        $username = $request->username;

        //Gathering data for the payerMail.php
        $compose = [
            'username' => $username,
            'email' => $email,
            'subject' => $subject,
            'message' => $message,
        ];

        //dd($compose);

        Mail::to($email)->send(new prayerMail($subject, $message, $email, $username ));

        return back()->with('success', 'Email sent successfully');
    }

    //Api to store
    public function storPrayereApi(Request $request)
    {
        //validate the request
        $request->validate([
            'fullname' => 'required',
            'email' => '',
            'phone' => 'required',
            'title' => 'required',
            'prayer_request' => 'required',
        ]);

        //store the prayer
        $prayer = new Prayer();
        $prayer->fullname = $request->fullname;
        $prayer->email = $request->email;
        $prayer->phone = $request->phone;
        $prayer->title = $request->title;
        $prayer->prayer_request = $request->prayer_request;
        $prayer->save();

        $success = "You have successfully submitted your prayer request.";
        return response()->json(['success' => $success], 200);
    }    
}
