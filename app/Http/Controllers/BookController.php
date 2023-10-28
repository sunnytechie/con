<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Bookcategory;
use Illuminate\Http\Request;
use App\Models\Booksubcategory;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Books - PDFs and more...";
        //bookcategories
        $bookcategories = Bookcategory::all();
        //categories
        $categories = Category::all();
        //booksubcategories
        $booksubcategories = Booksubcategory::all();
        //books
        //$books = Book::paginate(10);
        $books = Book::orderBy('id', 'desc')->get();
        return view('book.v23', compact('categories', 'books', 'title', 'bookcategories', 'booksubcategories'));
    }


    //store book
    public function store(Request $request)
    {
        //Validate the request...
        $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'description' => 'required',
            'file' => 'required|mimes:pdf',
            'type' => 'required',
            'price' => '',
            'bookcategory_id' => 'required',
            'booksubcategory_id' => '',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tag' => 'nullable',
        ]);

        //move pdf file to pdf folder
        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        //add time to file name to avoid duplicate file name
        $fileName = time() . '_' . $fileName;
        $file->move(public_path('pdf'), $fileName);
        $filePath = public_path('pdf/' . $fileName);

        //store image file in public/books/images
        $imagePath = request('image')->store('books/image', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();


        //store book
        $book = new Book();
        $book->title = $request->title;
        $book->author = $request->author;
        $book->description = $request->description;
        $book->file = $filePath;
        $book->image = $imagePath;
        $book->type = $request->type;
        $book->price = $request->price;
        $book->bookcategory_id = $request->bookcategory_id;
        $book->booksubcategory_id = $request->booksubcategory_id;
        $book->tag = $request->tag;

        $book->save();

        //redirect to back with success message
        return redirect()->back()->with('success', 'Book added successfully');
    }

    //edit book
    public function edit($book)
    {
        //books
        $books = Book::all();
        //categories
        $categories = Category::all();
        //bookcategories
        $bookcategories = Bookcategory::all();
        //booksubcategories
        $booksubcategories = Booksubcategory::all();
        //Variable to store book
        $book = Book::find($book);

        return view('book.edit', compact('book', 'categories', 'bookcategories', 'booksubcategories'));
    }

    //update book
    public function update(Request $request, $id)
    {
        //dd($request->all());
        //Validate the request...
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'description' => 'required',
            'type' => 'required',
            'price' => '',
            'bookcategory_id' => '',
            'booksubcategory_id' => 'required',
            'file' => 'mimes:pdf',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tag' => 'nullable',
        ]);

        //validate incoming request
        if ($validator->fails()) {
            return back()->withInput()->with('success', "please try again.");
        }

        //update pdf file in public/books when file is changed or image is changed
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();
            //add time to file name to avoid duplicate file name
            $fileName = time() . '_' . $fileName;
            $file->move(public_path('pdf'), $fileName);
            $filePath = public_path('pdf/' . $fileName);
        }

        //update image file in public/books/images when image is changed
        if ($request->hasFile('image')) {
            //update image file in public/books/images
            $imagePath = request('image')->store('books/image', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
            $image->save();
        }

        //update book
        $book = Book::find($id);
        $book->title = $request->title;
        $book->author = $request->author;
        $book->type = $request->type;
        $book->price = $request->price;
        $book->bookcategory_id = $request->bookcategory_id;
        $book->booksubcategory_id = $request->booksubcategory_id;
        $book->description = $request->description;
        $book->tag = $request->tag;
        if ($request->hasFile('file')) {
            $book->file = $filePath;
        }
        if ($request->hasFile('image')) {
            $book->image = $imagePath;
        }
        $book->save();

        //redirect to back with success message
        return redirect()->route('books.index')->with('success', 'Book updated successfully');

    }

    //delete book
    public function destroy($id)
    {
        //find book book
        $book = Book::find($id);
        $book->delete();
        return redirect()->back()->with('success', 'Book deleted successfully');
    }
}
