<?php

namespace App\Http\Controllers;

use App\Models\Prayer;
use Illuminate\Http\Request;

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
