<?php

namespace App\Http\Controllers;

use App\Models\Bookcategory;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class BookCategoryController extends Controller
{
    //Create a new controller instance.
    public function __construct()
    {
        $this->middleware('auth');
    }

    //store a book category
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'thumbnail' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = request('thumbnail')->store('uploads', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();


        $bookcategory = new Bookcategory;
        $bookcategory->title = $request->title;
        $bookcategory->thumbnail = $imagePath;
        $bookcategory->save();

        return back()->with('success', 'Book Category created successfully.');
    }
}
