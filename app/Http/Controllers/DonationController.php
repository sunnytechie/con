<?php

namespace App\Http\Controllers;

use App\Models\Diocese;
use App\Models\Donation;
use App\Models\Province;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //donations
        $title = "Donations Report";
        $donations = Donation::orderBy('id', 'desc')->get();
        $dioceses = Diocese::all();
        $provinces = Province::all();

        $from = $request->from;
        $to = $request->to;
        $prov = $request->province;
        $dio = $request->diocese;
        $don_type = $request->donation_type;

        return view('donation.index', compact('donations', 'title', 'provinces', 'dioceses', 'to', 'from', 'prov', 'dio', 'don_type'));
    }

    //search
    public function search(Request $request) {
        //dd($request->all());
        $title = "Filtered Result Donations Report";

        //Filter Search
        if ($request->has('from') && $request->has('to') && !$request->has('donation_type') && !$request->has('province') && !$request->has('diocese')) {
            $donations = Donation::orderBy('id', 'desc')
                ->whereBetween('created_at', [$request->from, $request->to])
                ->get();

        } elseif ($request->has('from') && $request->has('to') && $request->has('donation_type') && !$request->has('province') && !$request->has('diocese')) {
            $donations = Donation::orderBy('id', 'desc')
                ->whereBetween('created_at', [$request->from, $request->to])
                ->where('donation_type', $request->donation_type)
                ->get();

        } elseif ($request->has('from') && $request->has('to') && $request->has('donation_type') && $request->has('province') && $request->has('diocese')) {
            $donations = Donation::orderBy('id', 'desc')
            ->whereBetween('created_at', [$request->from, $request->to])
                ->where('donation_type', $request->donation_type)
                ->where('province_id', $request->province)
                ->where('diocese_id', $request->diocese)
                ->where('donation_type', $request->donation_type)
                ->get();

        }elseif (!$request->has('from') && !$request->has('to') && $request->has('donation_type') && !$request->has('province') && !$request->has('diocese')) {
            $donations = Donation::orderBy('id', 'desc')
                ->where('donation_type', $request->donation_type)
                ->get();

        }elseif (!$request->has('from') && !$request->has('to') && !$request->has('donation_type') && $request->has('province') && $request->has('diocese')) {
            $donations = Donation::orderBy('id', 'desc')
                ->where('province_id', $request->province)
                ->where('diocese_id', $request->diocese)
                ->get();

        }elseif (!$request->has('from') && !$request->has('to') && $request->has('donation_type') && $request->has('province') && $request->has('diocese')) {
            $donations = Donation::orderBy('id', 'desc')
            ->where('donation_type', $request->donation_type)
                ->where('province_id', $request->province)
                ->where('diocese_id', $request->diocese)
                ->get();

        }
        else {
            $donations = Donation::orderBy('id', 'desc')->get();
        }

        $dioceses = Diocese::all();
        $provinces = Province::all();

        $from = $request->from;
        $to = $request->to;
        $prov = $request->province;
        $dio = $request->diocese;
        $don_type = $request->donation_type;

        return view('donation.index', compact('donations', 'title', 'provinces', 'dioceses', 'to', 'from', 'prov', 'dio', 'don_type'));
    }

    //store the donation
    public function store(Request $request)
    {
        //validate the data
        $this->validate($request, [
            'name' => 'required',
            'email' => 'email',
            'currency' => 'required',
            'amount' => 'required',
            'reason' => '',
            'method' => 'required',
            'reference' => '',
            'province' => 'required',
            'diocese' => 'required',
        ]);

        //create a new donation
        $donation = new Donation;
        $donation->name = $request->name;
        $donation->email = $request->email;
        $donation->currency = $request->currency;
        $donation->amount = $request->amount;
        $donation->reason = $request->reason;
        $donation->method = $request->method;
        $donation->reference = $request->reference;
        $donation->province_id = $request->province;
        $donation->diocese_id = $request->diocese;
        $donation->deleted = false;
        $donation->save();

        return back()->with('success', 'Thank you for your donation!');
    }

    //destroy the donation
    public function destroy($id)
    {
        $donation = Donation::find($id);
        $donation->delete();
        return back()->with('success', 'Donation deleted!');
    }

    //APi to store donation
    public function storeDonationApi(Request $request)
    {
        //validate the data
        $this->validate($request, [
            'name' => 'required',
            'email' => '',
            'currency' => 'required',
            'amount' => 'required',
            'reason' => '',
            'method' => 'required',
            'reference' => '',
            'province' => 'required',
            'diocese' => 'required',
        ]);

        //create a new donation
        $donation = new Donation;
        $donation->name = $request->name;
        $donation->email = $request->email;
        $donation->currency = $request->currency;
        $donation->amount = $request->amount;
        $donation->reason = $request->reason;
        $donation->method = $request->method;
        $donation->reference = $request->reference;
        $donation->province_id = $request->province;
        $donation->diocese_id = $request->diocese;
        $donation->deleted = false;
        $donation->save();

        return response()->json(['success' => 'Thank you for your donation!']);
    }
}
