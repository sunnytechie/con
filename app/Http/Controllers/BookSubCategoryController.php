<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Bookcategory;
use Illuminate\Http\Request;
use App\Models\Booksubcategory;
use Intervention\Image\Facades\Image;

class BookSubCategoryController extends Controller
{
    public function index() {
        $fetchbookSubCategories = Booksubcategory::all();
        //bookcategories
        $bookcategories = Bookcategory::all();
        //categories
        $categories = Category::all();
        //booksubcategories
        $booksubcategories = Booksubcategory::all();

        return view('book.subcategory.index', compact('fetchbookSubCategories', 'bookcategories', 'categories', 'booksubcategories'));
    }
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

    public function edit($category) {
        $category = Booksubcategory::find($category);
        $categoryID = $category->id;
        $categoryTitle = $category->title;
        $bookCategoryId = $category->bookcategory_id;
        $categoryThumbnail = $category->thumbnail;
        $bookcategories = Bookcategory::all();

        return view('book.subcategory.edit', compact('categoryID', 'categoryTitle', 'bookCategoryId', 'categoryThumbnail', 'bookcategories'));
    }

    public function update(Request $request, Booksubcategory $category) {
        $data = $request->validate([
            'title' => 'required',
            'thumbnail' => 'image',
            'bookcategory_id' => 'required'
        ]);

        //dd($data);

        if ($request->hasFile('thumbnail')) {
            $imagePath = request('thumbnail')->store('uploads', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
            $image->save();
            $category->update([
                'thumbnail' => $imagePath,
                'title' => $data['title'],
                'bookcategory_id' => $data['bookcategory_id'],
            ]);
        }
        else {
            $category->update([
                'title' => $data['title'],
                'bookcategory_id' => $data['bookcategory_id'],
            ]);
        }

        return back()->with('success', 'Category updated successfully');
    }

    public function destroy($category) {
        $category = Booksubcategory::find($category);

        $category->delete();

        return back()->with('success', 'Deleted Successfully');
    }
}
