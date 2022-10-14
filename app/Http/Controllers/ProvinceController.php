<?php

namespace App\Http\Controllers;

use App\Models\Diocese;
use App\Models\Province;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinces = Province::orderBy('created_at', 'desc')->with('dioceses')->get();
        //dd($provinces);
        $dioceses = Diocese::orderBy('created_at', 'desc')->get();
        
        return view('province.index', compact('provinces', 'dioceses'));
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
        //Index
        //dd($request->all());
        $province = New Province;
        $province->name = $request->name;
        $province->state_name = $request->state_name;

        $province->save();

        return redirect()->back()->with('success', 'Province created.');
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
        $provinces = Province::orderBy('created_at', 'desc')->with('dioceses')->get();
        //dd($provinces);
        $dioceses = Diocese::orderBy('created_at', 'desc')->get();
        $province = Province::find($id);
        $provinceID = $province->id;
        $provinceName = $province->name;
        $provinceStateName = $province->state_name;

        return view('province.edit', compact('provinceName', 'provinceID', 'provinceStateName', 'provinces', 'dioceses'));
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
        $province = Province::find($id);
        $province->name = $request->name;
        $province->state_name = $request->state_name;
        $province->save();
        
        return back()->with('success', 'Edited Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $province = Province::find($id);
        $province->delete();
        return back()->with('success', 'Deleted Successfully');
    }
}
