<?php

namespace App\Http\Controllers;

use App\Models\Cycprovince;
use App\Models\Diocese;
use App\Models\Province;
use Illuminate\Http\Request;

class CycprovinceController extends Controller
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
        $cyc = New Cycprovince;
        $cyc->province_name = $request->province_name;
        $cyc->province_id = $request->province_id;
        $cyc->diocese = $request->diocese;
        $cyc->inagurated = $request->inagurated;
        $cyc->img_url = $request->img_url;
        $cyc->rev_name = $request->rev_name;
        $cyc->rev_title = $request->rev_title;
        $cyc->court = $request->court;
        $cyc->address = $request->address;
        $cyc->po_box = $request->po_box;
        $cyc->tel = $request->tel;
        $cyc->email = $request->email;
        $cyc->email_2 = $request->email_2;
        $cyc->website = $request->website;
        $cyc->synod_name = $request->synod_name;
        $cyc->synod_title = $request->synod_title;
        $cyc->synod_address = $request->synod_address;
        $cyc->synod_email = $request->synod_email;
        $cyc->synod_tel = $request->synod_tel;
        $cyc->save();

        return redirect()->back()->with('success', 'CYC Created successfully.');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
