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
        //studies
        $studies = Study::all();

        //purchased books
        $purchasedstudies = Purchasedstudy::orderBy('id', 'DESC')->paginate(10);
        
        return view('purchase.index', compact('studies', 'purchasedstudies'));
    }

    //search for purchase study
    public function search(Request $request)
    {
        $output = "";

        $purchasedstudies = Purchasedstudy::orderBy('id', 'DESC')->where('email', 'like', '%' . $request->search . '%')
            ->orWhere('transaction_ref', 'like', '%' . $request->search . '%')
            ->orWhere('price', 'like', '%' . $request->search . '%')
            ->orWhere('study_title', 'like', '%' . $request->search . '%')
            ->orWhere('payment_status', 'like', '%' . $request->search . '%')
            ->paginate(10);
        
        foreach ($purchasedstudies as $key => $purchasedstudy) {
            //key is the index of the array and starts from 1
            $key = $key + 1;
            $output.=
                '<tr>
                    <td>'.$key.'</td>
                    <td>'.$purchasedstudy->study_title.'</td>
                    <td>'.$purchasedstudy->email.'</td>
                    <td>'.$purchasedstudy->price.'</td>
                    <td>'.$purchasedstudy->transaction_ref.'</td>
                    <td>'.$purchasedstudy->created_at.'</td>
                    <td class="align-middle">
                    <div class="btn-group" role="group" aria-label="Button group">
  
                    <form action="/purchase/study/'.$purchasedstudy->id.'" method="post">
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
        return $output;
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
            'price' => '',
            'transaction_ref' => '',
            'payment_status' => '',
        ]);

        //find study
        $study = Study::find($request->study_id);
        $studyName = $study->study_title;
        $studyPrice = "500";
        $studyTypeName = $study->study_type_name;

        //store
        $purchasedstudy = new Purchasedstudy();
        $purchasedstudy->email = $request->email;
        $purchasedstudy->study_id = $request->study_id;
        $purchasedstudy->price = $studyPrice;
        $purchasedstudy->transaction_ref = $request->transaction_ref;
        $purchasedstudy->study_title = $studyName;
        $purchasedstudy->study_category_name = $studyTypeName;
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
            'study_id' => 'required',
            'price' => '',
            'transaction_ref' => '',
            'payment_status' => '',
        ]);
        
        //find study
        $study = Study::find($request->study_id);
        $studyName = $study->study_title;
        $studyPrice = "500";
        $studyTypeName = $study->study_type_name;
        
        //store
        $purchasedstudy = new Purchasedstudy();
        $purchasedstudy->email = $request->email;
        $purchasedstudy->study_id = $request->study_id;
        $purchasedstudy->price = $studyPrice;
        $purchasedstudy->transaction_ref = $request->transaction_ref;
        $purchasedstudy->study_title = $studyName;
        $purchasedstudy->study_category_name = $studyTypeName;
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

    //destroy
    public function destroy($id)
    {
        $purchasedstudy = Purchasedstudy::find($id);
        $purchasedstudy->delete();
        return back()->with('success', 'Book deleted successfully');
    }


}
