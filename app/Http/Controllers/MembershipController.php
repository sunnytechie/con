<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //memberships
        $memberships = Membership::paginate(10);;
        return view('membership.index', compact('memberships'));
    }

    //store
    public function store(Request $request)
    {
        //validate the data
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'email2' => '',
            'phone' => 'required',
            'phone2' => '',
            'street' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'province' => '',
            'diocease' => '',
            'date_of_birth' => '',
            'wedding_date' => '',
            'local_church_address' => '',
        ]);

        //create a new membership
        $membership = new Membership;
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
        return back()->with('success', 'Membership Created');
    }

    //destroy
    public function destroy($id) {
        $membership = Membership::find($id);
        $membership->delete();
        return back()->with('success', 'Membership deleted!');
    }
}
