<?php

namespace App\Http\Controllers;

use App\Models\Bcppurchase;
use App\Models\Hymnalpurchase;
use Illuminate\Http\Request;

class ReportPurchaseController extends Controller
{
    public function bcp() {
        $title = "Report on B. Common Prayer Purchase";
        $bcps = Bcppurchase::orderBy('id', 'desc')->get();

        return view('reports.bcp', compact('title', 'bcps'));
    }

    public function storePurchasedBcp(Request $request){
        $request->validate([
            'email' => 'required|email',
            'price' => 'required',
        ]);

        $purchasedBcp = new Bcppurchase(); ////If an error happens just recreate another model for this.
        $purchasedBcp->email = $request->email;
        $purchasedBcp->price = $request->price;
        $purchasedBcp->transaction_ref = "Mannual Payment";
        $purchasedBcp->transaction_status = 'success';
        $purchasedBcp->save();

        return back()->with('success', "Saved Successfully.");
    }

    public function hymnal() {
        $title = "Hymnals Purchase";
        $hymns = Hymnalpurchase::orderBy('id', 'desc')->get();

        return view('reports.hymnal', compact('title', 'hymns'));
    }

    public function purchaseHymnal(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'price' => 'required',
        ]);

        $purchasedBcp = new Hymnalpurchase(); ////If an error happens just recreate another model for this.
        $purchasedBcp->email = $request->email;
        $purchasedBcp->price = $request->price;
        $purchasedBcp->transaction_ref = "Manual Payment";
        $purchasedBcp->transaction_status = 'success';
        $purchasedBcp->save();

        return back()->with('success', "Saved Successfully.");

    }
}
