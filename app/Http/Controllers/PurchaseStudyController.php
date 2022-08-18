<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Study;
use Illuminate\Http\Request;
use App\Models\Purchasedstudy;

class PurchaseStudyController extends Controller
{
    //index for purchase study
    public function index()
    {
        //books
        $books = Book::all();
        //purchased books
        $purchasedstudies = Purchasedstudy::paginate(10);;
        
        return view('purchase.index', compact('books', 'purchasedstudies'));
    }

    //search for purchase study
    public function search(Request $request)
    {
        $output = "";

        $purchasedstudies = Purchasedstudy::where('email', 'like', '%' . $request->search . '%')
            ->orWhere('transaction_ref', 'like', '%' . $request->search . '%')
            ->orWhere('price', 'like', '%' . $request->search . '%')
            ->orWhere('payment_status', 'like', '%' . $request->search . '%')
            ->paginate(10);
        
        foreach ($purchasedstudies as $key => $purchasedstudy) {
            //key is the index of the array and starts from 1
            $key = $key + 1;
            $output.=
                '<tr>
                    <td>'.$key.'</td>
                    <td>'.$purchasedstudy->book->title.'</td>
                    <td>'.$purchasedstudy->email.'</td>
                    <td>'.$purchasedstudy->price.'</td>
                    <td>'.$purchasedstudy->transaction_ref.'</td>
                    <td>'.$purchasedstudy->created_at.'</td>
                    <td class="align-middle">
                    <div class="btn-group" role="group" aria-label="Button group">
                 
                        <a class="shadow border-radius-md bg-white btn btn-link text-secondary m-2" href="/payments/'.$purchasedstudy->id.'">
                          <i class="fa fa-pencil text-xs"></i>
                        </a>
  
                        <a class="shadow border-radius-md bg-white btn btn-link text-secondary m-2" href="#">
                          <i class="fa fa-trash text-xs"></i>
                        </a>                        
                      
                    </div>
                  </td>
                </tr>';
        }
        return $output;
    }

    public function rangeSearch(Request $request) {
        $studyName = $request->book_title;
        $startDate = $request->from;
        $endDate = $request->to;

        $studys = Study::all();
        
        //select purchased studys where study title is equal to the study name and created_at is between the start and end date

            $purchasedstudies = Purchasedstudy::where('study_title', '=', $studyName)
            ->orWhere('transaction_ref', '=', $studyName)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->get();

            //dd($purchasedstudies);

        return view('payment.range', compact('purchasedstudies', 'studys'));
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

        //find study
        $study = Study::find($request->study_id);
        $studyName = $study->title;
        $studyPrice = $study->price;

        //store
        $purchasedstudy = new Purchasedstudy();
        $purchasedstudy->email = $request->email;
        $purchasedstudy->study_id = $request->study_id;
        $purchasedstudy->price = $studyPrice;
        $purchasedstudy->transaction_ref = $request->transaction_ref;
        $purchasedstudy->study_title = $studyName;
        $purchasedstudy->payment_status = "Paid";
        $purchasedstudy->save();

        return back()->with('success', 'Book purchased successfully');
    }

    //api for purchase study
    public function apiStorePurchasedStudy(Request $request)
    {
        //validate
        $request->validate([
            'email' => 'required|email',
            'book_id' => 'required',
            'price' => '',
            'transaction_ref' => '',
            'payment_status' => '',
        ]);
        
        //find study
        $study = Study::find($request->study_id);
        $studyName = $study->title;
        $studyPrice = $study->price;
        
        //store
        $purchasedstudy = new Purchasedstudy();
        $purchasedstudy->email = $request->email;
        $purchasedstudy->study_id = $request->study_id;
        $purchasedstudy->price = $studyPrice;
        $purchasedstudy->transaction = $request->transaction_ref;
        $purchasedstudy->study_title = $studyName;
        $purchasedstudy->payment_status = "Paid";
        $purchasedstudy->save();

        return response()->json([
            'success' => true,
            'message' => 'Book purchased successfully',
        ]);
    }

    //api to get purchased study
    public function apiGetPurchasedStudy()
    {
        $purchasedstudies = Purchasedstudy::all();
        return response()->json(['purchasedStudies' => $purchasedstudies]);
    }


}
