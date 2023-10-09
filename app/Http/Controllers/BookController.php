<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Bookcategory;
use Illuminate\Http\Request;
use App\Models\Booksubcategory;
use Intervention\Image\Facades\Image;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //bookcategories
        $bookcategories = Bookcategory::all();
        //categories
        $categories = Category::all();
        //booksubcategories
        $booksubcategories = Booksubcategory::all();
        //books
        $books = Book::paginate(10);
        return view('book.index', compact('categories', 'books', 'bookcategories', 'booksubcategories'));
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
        $bookID = $book->id;
        $bookTitle = $book->title;
        $bookAuthor = $book->author;
        $bookDescription = $book->description;
        $bookFile = $book->file;
        $bookType = $book->type;
        $bookPrice = $book->price;
        $bookBookcategory = $book->bookcategory_id;
        $bookBooksubcategory = $book->booksubcategory_id;
        $bookImage = $book->image;

        return view('book.edit', compact('categories', 'bookcategories', 'bookID', 'bookTitle', 'bookAuthor', 'bookDescription', 'bookFile', 'bookImage', 'books', 'bookType', 'bookPrice', 'bookBookcategory', 'bookBooksubcategory', 'booksubcategories'));
    }

    //update book
    public function update(Request $request, $id)
    {
        //Validate the request...
        $request->validate([
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
        return redirect()->back()->with('success', 'Book updated successfully');

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
