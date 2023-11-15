<?php

namespace App\Http\Controllers;

use App\Models\Testimony;
use Illuminate\Http\Request;

class TestimonyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //testimonies
        $title = "Testimonies";
        $testimonies = Testimony::orderBy('id', 'desc')->get();
        return view('testimony.index', compact('testimonies', 'title'));
    }

    //api to store testimony
    public function storeTestimonyApi(Request $request)
    {
        //validate request
        $request->validate([
            'user_id' => '',
            'fullname' => 'required',
            'email' => '',
            'title' => 'required',
            'body' => 'required',
        ]);

        $testimony = new Testimony();
        $testimony->fullname = $request->fullname;
        $testimony->email = $request->email;
        $testimony->title = $request->title;
        $testimony->body = $request->body;
        $testimony->save();
        return response()->json(['success' => 'Your testimony has been submitted successfully.']);
    }

    //api to get all testimonies
    public function getTestimoniesApi()
    {
        $testimonies = Testimony::all();
        return response()->json($testimonies);
    }
}
