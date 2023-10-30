<?php

namespace App\Http\Controllers;

use App\Models\Hymnal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HymnalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Anglican Hymnals";
        $hymnals = Hymnal::orderBy('number', 'desc')->get();

        return view('hymnal.index', compact('hymnals', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        //validate request
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'number' => 'required',
            'content' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withInput()->with('success', "please try again.");
        }

        $hymnal = new Hymnal();
        $hymnal->number = $request->number;
        $hymnal->title = $request->title;
        $hymnal->content = $request->content;
        $hymnal->save();

        //return back
        return back()->with('success', "New Hymnals added successfully.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hymnal = Hymnal::find($id);
        return view('hymnal.edit', compact('hymnal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validate request
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'number' => 'required',
            'content' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withInput()->with('success', "please try again.");
        }

        $hymnal = Hymnal::find($id);
        $hymnal->number = $request->number;
        $hymnal->title = $request->title;
        $hymnal->content = $request->content;
        $hymnal->save();

        //return back
        return back()->with('success', "New Hymnals updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hymnal = Hymnal::find($id);
        $hymnal->delete();

        return back()->with('success', "Delete successfully.");
    }
}
