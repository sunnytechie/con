<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //donations
        $donations = Donation::orderBy('id', 'desc')->get();
        return view('donation.index', compact('donations'));
    }

    //search
    public function search(Request $request) {
        $output = "";
        $comfiirmation = "onclick='return confirm('Are you sure you want to delete this record?')'";
        $donations = Donation::where('name', 'like', '%' . $request->search . '%')
            ->orWhere('email', 'like', '%' . $request->search . '%')
            ->orWhere('currency', 'like', '%' . $request->search . '%')
            ->orWhere('amount', 'like', '%' . $request->search . '%')
            ->orWhere('reason', 'like', '%' . $request->search . '%')
            ->orWhere('method', 'like', '%' . $request->search . '%')
            ->orWhere('reference', 'like', '%' . $request->search . '%')
            ->orWhere('province', 'like', '%' . $request->search . '%')
            ->orWhere('diocese', 'like', '%' . $request->search . '%')
            ->paginate(10);

        foreach ($donations as $key => $donation) {
            //key is the index of the array and starts from 1
            $key = $key + 1;
            $output.=
                '<tr>
                    <td>'.$key.'</td>
                    <td>'.$donation->name.'</td>
                    <td>'.$donation->email.'</td>
                    <td>'.$donation->currency.'</td>
                    <td>'.$donation->amount.'</td>
                    <td>'.$donation->reason.'</td>
                    <td>'.$donation->method.'</td>
                    <td>'.$donation->reference.'</td>
                    <td>'.$donation->province.'</td>
                    <td>'.$donation->diocese.'</td>
                    <td class="align-middle">
                    <form action="/donations/destroy/'.$donation->id.'" method="post">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="'.csrf_token().'">
                        <button type="submit" class="shadow border-radius-md bg-white btn btn-link text-secondary m-2" onclick="
                            return confirm(\'Are you sure you want to delete this record?\')">
                        <i class="fa fa-trash text-xs"></i>
                        </button>
                    </form>
                        </td>
                </tr>';
        }
        return response($output);
    }

    //store the donation
    public function store(Request $request)
    {
        //validate the data
        $this->validate($request, [
            'name' => 'required',
            'email' => 'email',
            'currency' => 'required',
            'amount' => 'required',
            'reason' => '',
            'method' => 'required',
            'reference' => '',
            'province' => 'required',
            'diocese' => 'required',
        ]);

        //create a new donation
        $donation = new Donation;
        $donation->name = $request->name;
        $donation->email = $request->email;
        $donation->currency = $request->currency;
        $donation->amount = $request->amount;
        $donation->reason = $request->reason;
        $donation->method = $request->method;
        $donation->reference = $request->reference;
        $donation->province = $request->province;
        $donation->diocese = $request->diocese;
        $donation->deleted = false;
        $donation->save();

        return back()->with('success', 'Thank you for your donation!');
    }

    //destroy the donation
    public function destroy($id)
    {
        $donation = Donation::find($id);
        $donation->delete();
        return back()->with('success', 'Donation deleted!');
    }

    //APi to store donation
    public function storeDonationApi(Request $request)
    {
        //validate the data
        $this->validate($request, [
            'name' => 'required',
            'email' => '',
            'currency' => 'required',
            'amount' => 'required',
            'reason' => '',
            'method' => 'required',
            'reference' => '',
            'province' => 'required',
            'diocese' => 'required',
        ]);

        //create a new donation
        $donation = new Donation;
        $donation->name = $request->name;
        $donation->email = $request->email;
        $donation->currency = $request->currency;
        $donation->amount = $request->amount;
        $donation->reason = $request->reason;
        $donation->method = $request->method;
        $donation->reference = $request->reference;
        $donation->province = $request->province;
        $donation->diocese = $request->diocese;
        $donation->deleted = false;
        $donation->save();

        return response()->json(['success' => 'Thank you for your donation!']);
    }
}
