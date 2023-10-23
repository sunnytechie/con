<?php

namespace App\Http\Controllers;

use App\Models\Kidzone;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;

class KidZoneController extends Controller
{

    //index
    public function index() {
        $kidzones = \App\Models\Kidzone::orderBy('id', 'desc')->get();

        return view('kidzone.index', compact('kidzones'));
    }


    //store
    public function store(Request $request) {
        //dd($request->all());
        //validate request
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'url' => 'required',
            'image' => 'required|image',
        ]);

        //validate incoming request
        if ($validator->fails()) {
            return back()->withInput()->with('success', "please try again.");
        }

        $imagePath = request('image')->store('kidzone', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();

        //dd($imagePath);

        $kid = new Kidzone();
        $kid->title = $request->title;
        $kid->url = $request->url;
        $kid->image = $imagePath;
        $kid->save();

        //return back
        return back()->with('success', "Data stored successfully.");
    }

    //update
    public function update(Request $request, $id) {
        //validate request
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'url' => 'required',
            'image' => 'nullable|image',
        ]);

        //validate incoming request
        if ($validator->fails()) {
            return back()->withInput()->with('success', "please try again.");
        }

        if ($request->has('image')) {
            $imagePath = request('image')->store('kidzone', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
            $image->save();
        }

        $kid = Kidzone::find($id);
        $kid->title = $request->title;
        $kid->url = $request->url;
        if ($request->has('image')) {
        $kid->image = $imagePath;
        }
        $kid->save();

        //return back
        return back()->with('success', "Data updated successfully.");
    }

    //delete
    public function destroy($id) {
        $kidzone = Kidzone::find($id);
        if (!$kidzone) {
            return back()->with('error', 'Kidzone not found.');
        }

        $kidzone->delete();

        return back()->with('success', "Data deleted successfully.");
    }


}
