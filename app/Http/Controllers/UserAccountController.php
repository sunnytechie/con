<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Membership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserAccountController extends Controller
{
    public function accountDelete() {
        return view('account.delete');
    }

    public function deleteAccount(Request $request) {
        //validate email and password
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        //dd($request->all());

        //check user
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return back()->withInput()->with('error', 'User not found.');
        }

        //check password
        if (!Hash::check($request->password, $user->password)) {
            return back()->withInput()->with('error', 'Password not match.');
        }

        $token = $user->remember_token;

        $membership = Membership::where('user_id', $user->id)->first();

        if ($membership) {
            $membership->delete();
        }

        $user->delete();

        //return to https://www.conaio.com
        return redirect('https://www.conaio.com');
    }
}
