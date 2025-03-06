<?php

namespace App\Http\Controllers;

use App\Models\Price;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PriceController extends Controller
{
    public function index() {
        $title = 'Prices';
        $price = Price::first();
        //return $price;
        return view('prices.index', compact('title', 'price'));
    }

    public function update(Request $request, $id) {
        //validation
        $validation = Validator::make($request->all(), [
            'daily_dynamite' => 'required|numeric',
            'daily_dynamite_usd' => 'required|numeric',
            'daily_fountain' => 'required|numeric',
            'daily_fountain_usd' => 'required|numeric',
            'bible_study' => 'required|numeric',
            'bible_study_usd' => 'required|numeric',
            'cyc' => 'required|numeric',
            'cyc_usd' => 'required|numeric',
            'cyc_calender' => 'required|numeric',
            'cyc_calender_usd' => 'required|numeric',
            'bcp' => 'required|numeric',
            'bcp_usd' => 'required|numeric',
            'hymnal' => 'required|numeric',
            'hymnal_usd' => 'required|numeric',
        ]);

        if($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput()->with('success', 'Validation failed');
        }

        $price = Price::find($id);
        $price->daily_dynamite = $request->daily_dynamite;
        $price->daily_fountain = $request->daily_fountain;
        $price->bible_study = $request->bible_study;
        $price->cyc = $request->cyc;
        $price->cyc_calender = $request->cyc_calender;
        $price->bcp = $request->bcp;
        $price->hymnal = $request->hymnal;
        $price->daily_dynamite_usd = $request->daily_dynamite_usd;
        $price->daily_fountain_usd = $request->daily_fountain_usd;
        $price->bible_study_usd = $request->bible_study_usd;
        $price->cyc_usd = $request->cyc_usd;
        $price->cyc_calender_usd = $request->cyc_calender_usd;
        $price->bcp_usd = $request->bcp_usd;
        $price->hymnal_usd = $request->hymnal_usd;

        $price->daily_dynamite_euro = $request->daily_dynamite_euro;
        $price->daily_fountain_euro = $request->daily_fountain_euro;
        $price->bible_study_euro = $request->bible_study_euro;
        $price->cyc_euro = $request->cyc_euro;
        $price->cyc_calender_euro = $request->cyc_calender_euro;
        $price->bcp_euro = $request->bcp_euro;
        $price->hymnal_euro = $request->hymnal_euro;

        $price->daily_dynamite_pounds = $request->daily_dynamite_pounds;
        $price->daily_fountain_pounds = $request->daily_fountain_pounds;
        $price->bible_study_pounds = $request->bible_study_pounds;
        $price->cyc_pounds = $request->cyc_pounds;
        $price->cyc_calender_pounds = $request->cyc_calender_pounds;
        $price->bcp_pounds = $request->bcp_pounds;
        $price->hymnal_pounds = $request->hymnal_pounds;
        $price->save();

        return redirect()->route('price.index')->with('success', 'Prices updated successfully');

    }
}
