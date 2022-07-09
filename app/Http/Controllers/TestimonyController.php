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
        $testimonies = Testimony::all();
        return view('testimony.index', compact('testimonies'));
    }

    //api to store testimony
    public function storeTestimony(Request $request)
    {
        //validate request
        $request->validate([
            'fullname' => 'required',
            'email' => 'required',
            'title' => 'required',
            'body' => 'required',
        ]);

        $testimony = new Testimony();
        $testimony->fullname = $request->fullname;
        $testimony->email = $request->email;
        $testimony->title = $request->title;
        $testimony->body = $request->body;
        $testimony->save();
        return response()->json(['success' => 'Testimony sent successfully.']);
    }
}
