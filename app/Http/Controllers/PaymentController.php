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
    public function index(Request $request)
    {
        //books
        $title = "Books payments reports";
        $tag = "Payments";
        $books = Book::all();
        //purchased books
        $purchasedBooks = PurchasedBook::orderBy('created_at', 'desc')->get();

        //var
        $from = $request->from;
        $to = $request->to;
        $bk = $request->book;

        //return view
        return view('payment.v23', compact('books', 'purchasedBooks', 'title', 'tag', 'from', 'to', 'bk'));
    }

    //search
    public function search(Request $request)
    {
        //Search
        $title = "Books Filter result.";
        $tag = "Payments";
        $books = Book::all();
        //dd($request->all());
        //purchased books

        if ($request->has('from') && $request->has('to') && $request->has('book')) {
            $donations = $purchasedBooks = PurchasedBook::orderBy('created_at', 'desc')
                ->whereBetween('created_at', [$request->from, $request->to])
                ->where('book_id', $request->book)
                ->get();
        }
        else {
            $purchasedBooks = PurchasedBook::orderBy('created_at', 'desc')->get();
        }

        $from = $request->from;
        $to = $request->to;
        $bk = $request->book;

        //return view
        return view('payment.v23', compact('books', 'purchasedBooks', 'title', 'tag', 'from', 'to', 'bk'));
    }

    public function rangeSearch(Request $request)
    {
        //dd($request->all());

        $bookName = $request->book_title;
        $startDate = $request->from;
        $endDate = $request->to;

        $books = Book::all();

        //select purchased books where book title is equal to the book name and created_at is between the start and end date

            $purchasedBooks = PurchasedBook::where('book_title', '=', $bookName)
            ->orWhere('transaction_ref', '=', $bookName)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->get();

            //dd($purchasedBooks);

        return view('payment.range', compact('purchasedBooks', 'books'));
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
        $purchasedBook->book_title = $bookName;
        $purchasedBook->payment_status = "success";
        $purchasedBook->save();

        return back()->with('success', 'Book purchased successfully');
    }

    //api to store payment
    public function apiStorePurchasedBook(Request $request)
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
        $purchasedBook->book_title = $bookName;
        $purchasedBook->payment_status = "success";
        $purchasedBook->save();

        return response()->json(['success' => 'Book purchased successfully']);
    }


    //api to get purchased books by email
    public function apiGetPurchasedBooksByEmail(Request $request)
    {
        $email = $request->email;
        $purchasedBooks = PurchasedBook::where('email', '=', $email)->get();
        return response()->json(['purchasedBooks' => $purchasedBooks]);
    }

    //api to get purchased books
    public function apiGetPurchasedBooks(Request $request)
    {
        $purchasedBooks = PurchasedBook::all();
        return response()->json(['purchasedBooks' => $purchasedBooks]);
    }


    //edit
    public function edit($id)
    {
        //All purchased books
        $purchasedBooks = PurchasedBook::all();
        $books = Book::all();
        //get varaibles
        $purchasedBook = PurchasedBook::find($id);
        $purchasedBookTitle = $purchasedBook->book_title;
        $purchasedBookPrice = $purchasedBook->price;
        $purchasedBookEmail = $purchasedBook->email;
        $purchasedBookId = $purchasedBook->book_id;
        $purchasedId = $purchasedBook->id;

        return view('payment.edit', compact('purchasedBook', 'books', 'purchasedBookTitle', 'purchasedBookEmail', 'purchasedBookId', 'purchasedId', 'purchasedBooks', 'purchasedBookPrice'));
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
        $bookName = $book->title;

        //update
        $purchasedBook = PurchasedBook::find($id);
        $purchasedBook->book_id = $request->book_id;
        $purchasedBook->price = $bookPrice;
        $purchasedBook->book_title = $bookName;

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
