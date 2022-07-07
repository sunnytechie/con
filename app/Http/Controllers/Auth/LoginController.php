<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $input = $request->all();
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt(['email' => $input['email'], 'password' => $input['password']])) {

            //if user email is not verified
            if (auth()->user()->email_verified_at == null) {
                return redirect('email/verify');
            }

            if(auth()->user()->is_admin == 1) {
                return redirect()->route('home');
            }
            //if user email is verified
            if(auth()->user()->email_verified_at != null) {
                return redirect()->route('home');
            }                
            
            else {
                //return redirect to /verified
                return redirect()->route('verified');
            }
            
        } else {
            return redirect()->route('login')->with('error', 'Invalid email or password');
        }
    }
}
