<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Models\PurchasedBook;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //books
        $books = Book::all();
        //purchased books
        $purchasedBooks = PurchasedBook::all();
        return view('payment.index', compact('books', 'purchasedBooks'));
    }

    //store
    public function store(Request $request)
    {

        //validate
        $request->validate([
            'email' => 'required|email',
            'book_id' => 'required',
            'price' => '',
            'transaction_ref' => '',
            'payment_status' => '',
        ]);

        //find book
        $book = Book::find($request->book_id);
        $bookName = $book->title;
        $bookPrice = $book->price;

        //store
        $purchasedBook = new PurchasedBook;
        $purchasedBook->email = $request->email;
        $purchasedBook->book_id = $request->book_id;
        $purchasedBook->price = $bookPrice;
        $purchasedBook->transaction_ref = $request->transaction_ref;
        $purchasedBook->payment_status = $request->payment_status;
        $purchasedBook->save();

        return back()->with('success', 'Book purchased successfully');
    }

    //edit
    public function edit($id)
    {
        //All purchased books
        $purchasedBooks = PurchasedBook::all();
        $books = Book::all();
        //get varaibles
        $purchasedBook = PurchasedBook::find($id);
        $purchasedBookTitle = $purchasedBook->book->title;
        $purchasedBookEmail = $purchasedBook->email;
        $purchasedBookId = $purchasedBook->book_id;
        $purchasedId = $purchasedBook->id;

        return view('payment.edit', compact('purchasedBook', 'books', 'purchasedBookTitle', 'purchasedBookEmail', 'purchasedBookId', 'purchasedId', 'purchasedBooks'));
    }

    //update
    public function update(Request $request, $id)
    {
        //validate
        $request->validate([
            'book_id' => 'required'
        ]);

        //find book
        $book = Book::find($request->book_id);
        $bookPrice = $book->price;

        //update
        $purchasedBook = PurchasedBook::find($id);
        $purchasedBook->book_id = $request->book_id;
        $purchasedBook->price = $bookPrice;
        $purchasedBook->save();

        return back()->with('success', 'Book updated successfully');
    }

    //destroy
    public function destroy($id)
    {
        //find book
        $purchasedBook = PurchasedBook::find($id);
        $purchasedBook->delete();
        return back()->with('success', 'Book deleted successfully');
    }
}
