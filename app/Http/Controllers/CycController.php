<?php

namespace App\Http\Controllers;

use App\Models\Cyc;
use Illuminate\Http\Request;

class CycController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cycs = Cyc::orderBy('created_at', 'desc')
                    ->paginate(10);

                    return view('cyc.index', compact('cycs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cyc.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $this->validate($request, [
            'cyc_title' => 'required',
            'cyc_year' => 'required',
            'cyc_pdf' => 'required|mimes:pdf',
        ]);

        //dd($request->all());

        $file = $request->file('cyc_pdf');
        $fileName = $file->getClientOriginalName();
        //add time to file name to avoid duplicate file name
        $fileName = time() . '_' . $fileName;
        $file->move(public_path('pdf'), $fileName);
        $filePath = public_path('pdf/' . $fileName);

        $cyc = new Cyc;
        $cyc->cyc_title = $request->cyc_title;
        $cyc->cyc_year = $request->cyc_year;
        $cyc->cyc_pdf = $filePath;
        $cyc->save();

        return redirect()->route('cyc.index')->with('success', 'New CYC created successfully');
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
        $cyc = Cyc::find($id);
        $cycID = $cyc->id;
        $cycTitle = $cyc->cyc_title;
        $cycYear = $cyc->cyc_year;
        $cycPdf = $cyc->cyc_pdf;

        return view('cyc.edit', compact('cycID', 'cycTitle', 'cycYear', 'cycPdf'));
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
        $this->validate($request, [
            'cyc_title' => 'required',
            'cyc_year' => 'required',
            'cyc_pdf' => 'mimes:pdf',
        ]);
        
        if ($request->hasFile('cyc_pdf')) {
            $file = $request->file('cyc_pdf');
        $fileName = $file->getClientOriginalName();
        //add time to file name to avoid duplicate file name
        $fileName = time() . '_' . $fileName;
        $file->move(public_path('pdf'), $fileName);
        $filePath = public_path('pdf/' . $fileName);
        }

        $cyc = Cyc::find($id);
        if ($request->hasFile('cyc_pdf')) {
            $cyc->cyc_pdf = $filePath;
        }
        $cyc->cyc_title = $request->cyc_title;
        $cyc->cyc_year = $request->cyc_year;
        $cyc->save();

        //redirect to back with success message
        return redirect()->back()->with('success', 'CYC updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cyc = Cyc::find($id);
        $cyc->delete();
        return redirect()->back()->with('success', 'CYC deleted successfully');
    }
}
