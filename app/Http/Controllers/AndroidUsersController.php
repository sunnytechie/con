<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use App\Models\User;
use Illuminate\Http\Request;

class AndroidUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //all user that are not admin
        $users = User::where('is_admin', 0)->get();
        return view('android.index', compact('users'));
    }

    //show user details
    public function show($email)
    {
        //get membership details where email is equal to the email in the url
        $membership = Membership::find($email);

        $membership = Membership::where('email', $email)->first();
        
        $membershipFirstName = $membership->first_name;
        $membershipLastName = $membership->last_name;
        $membershipEmail = $membership->email;
        $membershipEmail2 = $membership->email2;
        $membershipPhone = $membership->phone;
        $membershipPhone2 = $membership->phone2;
        $membershipStreet = $membership->street;
        $membershipCity = $membership->city;
        $membershipState = $membership->state;
        $membershipCountry = $membership->country;
        $membershipProvince = $membership->province;
        $membershipDiocese = $membership->diocese;
        $membershipDateOfBirth = $membership->date_of_birth;
        $membershipWeddingDate = $membership->wedding_date;
        $membershipLocalChurchAddress = $membership->local_church_address;

        
        return view('android.show', compact('membershipFirstName', 'membershipLastName', 'membershipEmail', 'membershipEmail2', 'membershipPhone', 'membershipPhone2', 'membershipStreet', 'membershipCity', 'membershipState', 'membershipCountry', 'membershipProvince', 'membershipDiocese', 'membershipDateOfBirth', 'membershipWeddingDate', 'membershipLocalChurchAddress'));
    }
}
