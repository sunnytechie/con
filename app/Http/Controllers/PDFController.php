<?php

namespace App\Http\Controllers;

use App\Models\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PDFController extends Controller
{
    //store pdf
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'path' => 'required',
            'price' => 'required',
            'tag' => 'nullable'
        ]);

        //validate request error
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->errors());
        }

        //store pdf in storage
        if ($request->hasFile('path')) {
            $file = $request->file('path');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('pdfs'), $filename);
        }

        //store pdf
        $pdf = new Pdf();
        $pdf->title = $request->title;
        $pdf->path = $request->path;
        $pdf->price = $request->price;
        $pdf->tag = $request->tag;
        $pdf->save();

        return back()->with('success', 'PDF created successfully');
    }
}
