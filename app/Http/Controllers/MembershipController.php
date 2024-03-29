<?php

namespace App\Http\Controllers;

use App\Models\Diocese;
use App\Models\Membership;
use App\Models\Province;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = "Registered Memberships";
        $memberships = Membership::orderBy('id', 'desc')->get();

        $provinces = Province::all();
        $dioceses = Diocese::all();

        $dio = $request->diocese;
        $prov = $request->province;

        return view('membership.index', compact('memberships', 'title', 'provinces', 'dioceses', 'dio', 'prov',));

    }

    public function search(Request $request)
    {
        //dd($request->all());
        $title = "Filtered Memberships Result ";
        if ($request->has('province') && $request->has('to') && $request->has('diocese')) {
            $memberships = Membership::orderBy('id', 'desc')
                ->where('diocease', $request->diocese)
                ->where('province', $request->province)
                ->get();
        }
        else {
            $memberships = Membership::orderBy('id', 'desc')->get();
        }


        $provinces = Province::all();
        $dioceses = Diocese::all();

        $dio = $request->diocese;
        $prov = $request->province;

        return view('membership.index', compact('memberships', 'title', 'provinces', 'dioceses', 'dio', 'prov',));

    }

    //store
    public function storeMembershipApi(Request $request)
    {
        //validate the data
        $this->validate($request, [
            'fullname' => '',
            'first_name' => '',
            'last_name' => '',
            'email' => 'required|email',
            'email2' => '',
            'phone' => 'required',
            'phone2' => '',
            'street' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => '',
            'province' => '',
            'diocease' => '',
            'date_of_birth' => '',
            'wedding_date' => '',
            'local_church_address' => '',
        ]);

        //create a new membership
        $membership = new Membership;
        $membership->first_name = $request->input('fullname');
        $membership->first_name = $request->input('first_name');
        $membership->last_name = $request->input('last_name');
        $membership->email = $request->input('email');
        $membership->email2 = $request->input('email2');
        $membership->phone = $request->input('phone');
        $membership->phone2 = $request->input('phone2');
        $membership->street = $request->input('street');
        $membership->city = $request->input('city');
        $membership->state = $request->input('state');
        $membership->country = $request->input('country');
        $membership->province = $request->input('province');
        $membership->diocease = $request->input('diocease');
        $membership->date_of_birth = $request->input('date_of_birth');
        $membership->wedding_date = $request->input('wedding_date');
        $membership->local_church_address = $request->input('local_church_address');
        $membership->save();

        return response()->json(['success' => 'Your Membership for has been submitted successfully.']);
    }

    //destroy
    public function destroy($id) {
        $membership = Membership::find($id);
        $membership->delete();
        return back()->with('success', 'Membership deleted!');
    }
}
