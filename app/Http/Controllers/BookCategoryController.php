<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Bookcategory;
use Illuminate\Http\Request;
use App\Models\Booksubcategory;
use Intervention\Image\Facades\Image;

class BookCategoryController extends Controller
{
    //Index
    public function index() {
        $fetchbookCategories = Bookcategory::all();
        //bookcategories
        $bookcategories = Bookcategory::all();
        //categories
        $categories = Category::all();
        //booksubcategories
        $booksubcategories = Booksubcategory::all();

        return view('book.category.index', compact('fetchbookCategories', 'bookcategories', 'categories', 'booksubcategories'));
    }

    public function edit($category) {
        $category = Bookcategory::find($category);

        $categoryID = $category->id;
        $categoryTitle = $category->title;
        $categoryThumbnail = $category->thumbnail;

        return view('book.category.edit', compact('categoryID', 'categoryTitle', 'categoryThumbnail'));

    }

    public function update(Request $request, Bookcategory $category) {
        $data = $request->validate([
            'title' => 'required',
            'thumbnail' => 'image',
        ]);

        if ($request->hasFile('thumbnail')) {
            $imagePath = request('thumbnail')->store('uploads', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
            $image->save();
            $category->update([
                'thumbnail' => $imagePath,
                'title' => $data['title'],
            ]);
        }
        else {
            $category->update([
                'title' => $data['title'],
            ]);
        }

        return back()->with('success', 'Category updated successfully');
    }

    public function destroy($category) {
        $category = Bookcategory::find($category);
        $category->delete();

        return redirect()->back()->with('success', 'Category deleted successfully');
    }

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
        //count books with this bookcategory id
        foreach ($bookcategories as $bookcategory) {
            $bookcategory->books_count = Book::where('bookcategory_id', $bookcategory->id)->count();
        }
        
        return response()->json($bookcategories);
    }

    public function bookcategoryApiFree()
    {
        //get bookategory with that has books with this bookcategory id
        $bookcategories = Bookcategory::whereHas('books', function ($query) {
            $query->where('type', 0);
        })->get();
        //$bookcategories = Bookcategory::where('type', 0)->get();
        //get bookategory with books type 0

        foreach ($bookcategories as $bookcategory) {
            $bookcategory->books_count = Book::where('bookcategory_id', $bookcategory->id)->count();
        }
        
        return response()->json($bookcategories);
    }

    public function bookcategoryApiPaid()
    {
        $bookcategories = Bookcategory::whereHas('books', function ($query) {
            $query->where('type', 1);
        })->get();
        //count books with this bookcategory id
        foreach ($bookcategories as $bookcategory) {
            $bookcategory->books_count = Book::where('bookcategory_id', $bookcategory->id)->where('type', 1)->count();
        }
        
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
        $books = Book::where('booksubcategory_id', $id)->where('type', '1')->get();
        return response()->json($books);
    }

    //APIs for books with bookcategory_id where type is 0
    public function bookDetailsApiFree($id)
    {
        $books = Book::where('booksubcategory_id', $id)->where('type', '0')->get();
        return response()->json($books);
    }
  
}
