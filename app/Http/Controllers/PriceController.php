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
            'daily_fountain' => 'required|numeric',
            'bible_study' => 'required|numeric',
            'cyc' => 'required|numeric',
            'cyc_calender' => 'required|numeric',
            'bcp' => 'required|numeric',
            'hymnal' => 'required|numeric',
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
        $price->save();

        return redirect()->route('price.index')->with('success', 'Prices updated successfully');

    }
}
