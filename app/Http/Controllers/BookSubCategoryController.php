<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booksubcategory;
use Intervention\Image\Facades\Image;

class BookSubCategoryController extends Controller
{
    //Store a book sub category
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'thumbnail' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'bookcategory_id' => 'required',
        ]);

        $imagePath = request('thumbnail')->store('uploads', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();

        $booksubcategory = new Booksubcategory;
        $booksubcategory->title = $request->title;
        $booksubcategory->thumbnail = $imagePath;
        $booksubcategory->bookcategory_id = $request->bookcategory_id;
        $booksubcategory->save();

        return back()->with('success', 'Book Sub Category created successfully.');
    }
}
