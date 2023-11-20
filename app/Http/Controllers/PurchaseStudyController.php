<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Study;
use Illuminate\Http\Request;
use App\Models\Purchasedstudy;
use Illuminate\Support\Facades\Auth;

class PurchaseStudyController extends Controller
{
    //index for purchase study
    public function index(Request $request)
    {
        //studies
        $studies = Study::all();
        $title = "Devotionals Purchases report.";

        //purchased books
        $purchasedstudies = Purchasedstudy::orderBy('id', 'desc')->get();

        $sk = $request->study_id;

        return view('purchase.index', compact('studies', 'purchasedstudies', 'title', 'sk'));
    }

    //search for purchase study
    public function search(Request $request)
    {
        //dd($request->all());
        $studies = Study::all();
        $title = "Filtered Results";

        if ($request->has('from') && $request->has('to') && $request->has('book')) {
            $donations = $purchasedBooks = Purchasedstudy::orderBy('id', 'desc')
                ->whereBetween('created_at', [$request->from, $request->to])
                ->where('type', $request->study)
                ->get();
        }
        else {
            $purchasedstudies = Purchasedstudy::orderBy('id', 'DESC')->orderBy('id', 'desc')->get();
        }

        $from = $request->from;
        $to = $request->to;
        $sk = $request->study_id;

        return view('purchase.index', compact('studies', 'purchasedstudies', 'title', 'sk'));
    }

    public function rangeSearch(Request $request) {
        $studyCategory = $request->study_category;
        $startDate = $request->from;
        $endDate = $request->to;

        $studies = Study::all();

        //select purchased stud$studies where study title is equal to the study name and created_at is between the start and end date

            $purchasedstudies = Purchasedstudy::where('study_category_name', $studyCategory)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->get();

            //dd($purchasedstudies);

        return view('purchase.range', compact('purchasedstudies', 'studies'));
    }

//store
    public function store(Request $request)
    {
        //validate
        $request->validate([
            'email' => 'required|email',
            'study_id' => 'required',
            'price' => 'required',
            'transaction_ref' => '',
            'payment_status' => '',
            'valid_year' => 'required',
        ]);

        //dd($request->all());

        //Declare by type
        //Fountain = 1
        //Bible Study = 2
        //Daily dynamite = 3

        //find study
        switch ($request->study_id) {
            case '1':
                $studyName = "Daily Fountain";
                $studyTypeName = "Daily Fountain";
                break;

            case '2':
                $studyName = "Bible Study";
                $studyTypeName = "Bible Study";
                break;

            case '3':
                $studyName = "Daily Dynamite";
                $studyTypeName = "Daily Dynamite";
                break;

            default:
            $studyName = "nil";
            $studyTypeName = "nil";
                break;
        }

        $userID = Auth::user()->id;

        //dd($userID);

        //store
        $purchasedstudy = new Purchasedstudy();
        $purchasedstudy->email = $request->email;
        $purchasedstudy->study_id = $request->study_id;
        $purchasedstudy->valid_year = $request->valid_year;
        $purchasedstudy->price = $request->price;
        $purchasedstudy->transaction_ref = $request->transaction_ref;
        $purchasedstudy->study_title = $studyName;
        $purchasedstudy->study_category_name = $studyTypeName;
        $purchasedstudy->payment_status = "Paid";
        $purchasedstudy->user_id = $userID;
        $purchasedstudy->save();

        return back()->with('success', 'Book purchased successfully');
    }

    //api for purchase study
    public function apiStorePurchasedStudy(Request $request)
    {
        //validate
        $request->validate([
            'email' => 'required|email',
            'valid_year' => 'required',
            'price' => 'required',
            'transaction_ref' => '',
            'payment_status' => '',
            'user_id' => '',
        ]);

        //find study
        switch ($request->study_id) {
            case '1':
                $studyName = "Daily Fountain";
                $studyTypeName = "Daily Fountain";
                break;

            case '2':
                $studyName = "Bible Study";
                $studyTypeName = "Bible Study";
                break;

            case '3':
                $studyName = "Daily Dynamite";
                $studyTypeName = "Daily Dynamite";
                break;

            default:
            $studyName = "nil";
            $studyTypeName = "nil";
                break;
        }

        //store
        $purchasedstudy = new Purchasedstudy();
        $purchasedstudy->email = $request->email;
        $purchasedstudy->study_id = $request->study_id;
        $purchasedstudy->user_id = $request->user_id;
        $purchasedstudy->price = $request->price;
        $purchasedstudy->valid_year = $request->valid_year;
        $purchasedstudy->transaction_ref = $request->transaction_ref;
        $purchasedstudy->study_title = $studyName;
        $purchasedstudy->study_category_name = $studyTypeName;
        $purchasedstudy->payment_status = "Paid";
        $purchasedstudy->save();

        return response()->json([
            'status' => true,
            'message' => 'Book purchased successfully',
        ]);
    }

    //api to get purchased study
    public function apiGetPurchasedStudy()
    {
        $purchasedstudies = Purchasedstudy::all();
        return response()->json(['purchasedStudies' => $purchasedstudies]);
    }

    //destroy
    public function destroy($id)
    {
        $purchasedstudy = Purchasedstudy::find($id);
        $purchasedstudy->delete();
        return back()->with('success', 'Book deleted successfully');
    }


}
