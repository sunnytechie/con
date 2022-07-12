<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use App\Models\Profile;
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
    public function show($id)
    {
        $users = User::find($id);

        $profileFind = Profile::where('user_id', $id)->first();

        //profileFInd is null if user has no profile
        if ($profileFind == null) {
            //Varriable for profile
        $first_name = "";
        $last_name = "";
        $email = "";
        $email2 = "";
        $phone = "";
        $phone2 = "";
        $street = "";
        $city = "";
        $state = "";
        $country = "";
        $province = "";
        $diocese = "";
        $date_of_birth = "";
        $wedding_date = "";
        $local_church_address = "";
        } else {
            //Varriable for profile
        $first_name = $profileFind->first_name;
        $last_name = $profileFind->last_name;
        $email = $users->email;
        $email2 = $profileFind->email2;
        $phone = $profileFind->phone;
        $phone2 = $profileFind->phone2;
        $street = $profileFind->street;
        $city = $profileFind->city;
        $state = $profileFind->state;
        $country = $profileFind->country;
        $province = $profileFind->province;
        $diocese = $profileFind->diocese;
        $date_of_birth = $profileFind->date_of_birth;
        $wedding_date = $profileFind->wedding_date;
        $local_church_address = $profileFind->local_church_address;
        }

        

        return view('android.show', compact('users', 'first_name', 'last_name', 'email', 'email2', 'phone', 'phone2', 'street', 'city', 'state', 'country', 'province', 'diocese', 'date_of_birth', 'wedding_date', 'local_church_address'));
    }
}
