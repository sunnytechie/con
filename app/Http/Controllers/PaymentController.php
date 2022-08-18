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
        $purchasedBooks = PurchasedBook::paginate(10);;
        return view('payment.index', compact('books', 'purchasedBooks'));
    }

    //search
    public function search(Request $request)
    {
        $output = "";

        $purchasedBooks = PurchasedBook::orderBy('id', 'DESC')->where('email', 'like', '%' . $request->search . '%')
            ->orWhere('transaction_ref', 'like', '%' . $request->search . '%')
            ->orWhere('price', 'like', '%' . $request->search . '%')
            ->orWhere('book_title', 'like', '%' . $request->search . '%')
            ->orWhere('payment_status', 'like', '%' . $request->search . '%')
            ->paginate(10);

        foreach ($purchasedBooks as $key => $purchasedBook) {
            //key is the index of the array and starts from 1
            $key = $key + 1;
            $output.=
                '<tr>
                    <td>'.$key.'</td>
                    <td>'.$purchasedBook->book->title.'</td>
                    <td>'.$purchasedBook->email.'</td>
                    <td>'.$purchasedBook->price.'</td>
                    <td>'.$purchasedBook->transaction_ref.'</td>
                    <td>'.$purchasedBook->created_at.'</td>
                    <td class="align-middle">
                    <div class="btn-group" role="group" aria-label="Button group">
                 
                        <a class="shadow border-radius-md bg-white btn btn-link text-secondary m-2" href="/payments/'.$purchasedBook->id.'">
                          <i class="fa fa-pencil text-xs"></i>
                        </a>
 
                        <form action="/payments/'.$purchasedBook->id.'" method="post">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="'.csrf_token().'">
                                    <button type="submit" class="shadow border-radius-md bg-white btn btn-link text-secondary m-2" onclick="
                                        return confirm(\'Are you sure you want to delete this record?\')">
                                    <i class="fa fa-trash text-xs"></i>
                                    </button>
                        </form>                        
                      
                    </div>
                  </td>
                </tr>';
        }

        return response($output);
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
        $purchasedBook->payment_status = "Paid";
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
        $purchasedBook->payment_status = "Paid";
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
