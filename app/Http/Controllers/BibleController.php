<?php

namespace App\Http\Controllers;

use App\Models\Bible;
use Illuminate\Http\Request;


class BibleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //bibles paginate 20
        $bibles = Bible::paginate(10);
        return view('bible.index', compact('bibles'));
    }

    //create bible
    public function create()
    {
        return view('bible.create');
    }

    //store bible
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => '',
            'source' => 'required',
            'version' => '',
            'shortcode' => '',
        ]);

        $file = $request->file('source');
        $fileName = $file->getClientOriginalName();
        //change file name to avoid duplicate file name
        $fileName = time() . '-' . $fileName;
        
        $fileFolder = 'bibles/';
        $filePath = $fileFolder . $fileName;
        $file->storeAs('public/bibles', $fileName);

        //dd($request->all());

        $bible = new Bible;
        $bible->name = $request->name;
        $bible->description = $request->description;
        $bible->source = $filePath;
        $bible->version = $request->version;
        $bible->shortcode = $request->shortcode;
        $bible->save();
        return redirect()->route('bibles.index')->with('success', 'Bible created successfully');
    }

    //edit bible
    public function edit($id)
    {
        $bible = Bible::find($id);
        $bibleId = $bible->id;
        $bibleName = $bible->name;
        $bibleDescription = $bible->description;
        $bibleSource = $bible->source;
        $bibleVersion = $bible->version;
        $bibleShortcode = $bible->shortcode;
        return view('bible.edit', compact('bibleId', 'bibleName', 'bibleDescription', 'bibleSource', 'bibleVersion', 'bibleShortcode'));                                                    
    }

    //update bible
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => '',
            'source' => '',
            'version' => '',
            'shortcode' => '',
        ]);

        //store source file
        if ($request->hasFile('source')) {
            $file = $request->file('source');
            $fileName = $file->getClientOriginalName();
            //change file name to avoid duplicate file name
            $fileName = time() . '-' . $fileName;
            
            $fileFolder = 'bibles/';
            $filePath = $fileFolder . $fileName;
            $file->storeAs('public/bibles', $fileName);
        }

        $bible = Bible::find($id);
        $bible->name = $request->name;
        $bible->description = $request->description;
        if ($request->hasFile('source')) {
            $bible->source = $filePath;
        }
        $bible->version = $request->version;
        $bible->shortcode = $request->shortcode;
        $bible->save();
        return back()->with('success', 'Bible updated successfully');
    }

    //delete bible
    public function destroy($id)
    {
        $bible = Bible::find($id);
        $bible->delete();
        return back()->with('success', 'Bible deleted successfully');
    }
}
