<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Bookcategory;
use Illuminate\Http\Request;
use App\Models\Booksubcategory;
use Intervention\Image\Facades\Image;

class BookCategoryController extends Controller
{
    //Create a new controller instance.

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
    
    //APIs for bookcategory with books
    public function bookcategoryApi()
    {
        $bookcategories = Bookcategory::get();
        return response()->json($bookcategories);
    }

    //APIs for subbookcategory with with bookcategory id
    public function bookSubCategoriesApi($id)
    {
        $bookSubCategories = Booksubcategory::where('bookcategory_id', $id)->get();
        return response()->json($bookSubCategories);
    }

   //APIs for books with bookcategory_id where type is 1
    public function bookDetailsApiPaid($id)
    {
        $books = Book::where('bookcategory_id', $id)->where('type', '1')->get();
        return response()->json($books);
    }

    //APIs for books with bookcategory_id where type is 0
    public function bookDetailsApiFree($id)
    {
        $books = Book::where('bookcategory_id', $id)->where('type', '0')->get();
        return response()->json($books);
    }
  
}
