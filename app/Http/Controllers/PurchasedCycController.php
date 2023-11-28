<?php

namespace App\Http\Controllers;

use App\Models\Cyc;
use App\Models\Purchasecyc;
use Illuminate\Http\Request;

class PurchasedCycController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchasedCycs = Purchasecyc::orderBy('created_at', 'desc')->get();
        $cycs = Cyc::orderBy('created_at', 'desc')->get();
        $title = "Church year Calendar Purchase report";
        return view('purchaseCYC.index', compact('purchasedCycs', 'cycs', 'title'));
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
        
        $request->validate([
            'email' => 'required|email',
            'price' => 'required',
        ]);


        $purchasedCyc = new Purchasecyc();
        $purchasedCyc->email = $request->email;
        $purchasedCyc->price = $request->price;
        $purchasedCyc->transaction_ref = "Manual Payment";
        $purchasedCyc->payment_status = 'success';
        $purchasedCyc->cyc_id = 'nil'; //not needed
        $purchasedCyc->cyc_title = 'nil'; //not needed
        $purchasedCyc->cyc_year = 'nil'; //not needed
        $purchasedCyc->save();

        return redirect()->route('purchased.cyc.index')->with('success', 'New CYC purchased successfully');
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
        $purchasedCyc = Purchasecyc::find($id);
        $purchasedCyc->delete();

        return redirect()->back()->with('success', 'Record deleted successfully');
    }
}
