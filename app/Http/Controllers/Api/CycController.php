<?php

namespace App\Http\Controllers\Api;

use App\Models\Cyc;
use App\Models\Purchasecyc;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CycController extends Controller
{
    //index
    public function index() {
        $purchasedCycs = Purchasecyc::orderBy('created_at', 'desc')->get();
        return response()->json($purchasedCycs);
    }


    //store
    public function store(Request $request) {
        
        //validate request
        //validate
        $request->validate([
            'email' => 'required|email',
            'price' => 'required',
            'cyc_id' => 'required',
            'transaction_ref' => 'required',
        ]);

        $cyc_id = $request->cyc_id;
        $cyc = Cyc::find($cyc_id);
        $cycTitle = $cyc->cyc_title;
        $cycYear = $cyc->cyc_year;

        $purchasedCyc = new Purchasecyc();
        $purchasedCyc->email = $request->email;
        $purchasedCyc->cyc_id = $request->cyc_id;
        $purchasedCyc->price = $request->price;
        $purchasedCyc->cyc_title = $cycTitle;
        $purchasedCyc->cyc_year = $cycYear;
        $purchasedCyc->payment_status = 'Paid';
        $purchasedCyc->transaction_ref = $request->transaction_ref;
        $purchasedCyc->save();

        return response()->json([
            'Success' => 'CYC purchased successfully',
        ]);
    }
}
