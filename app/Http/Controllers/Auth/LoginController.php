<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

    //api for user login
    public function loginApi(Request $request)
    {
        //$success = "Successfully logged in";
        $input = $request->all();
        $this->validate($request, [
            'email' => 'required|email',
            'password' => '',
            'login_type' => '',
        ]);

        $checkLoginType = $input['login_type'];

        switch ($checkLoginType) {
            case 'Google':
                $email = $input['email'];
                $user = User::where('email', $email)
                ->where('login_type', $checkLoginType)
                ->latest()->first();

                if ($user == null) {
                    return response()->json(['error' => 'User not found'], 401);
                }else {
                    return response()->json(['success' => 'Successfully logges in', 'user' => $user], 200);
                }
                
                
                break;
            
            default:
            if (auth()->attempt(['email' => $input['email'], 'password' => $input['password']])) {

                //if user email is not verified
                if (auth()->user()->email_verified_at == null) {
                    return response()->json(['error' => 'Kindly check your mail inbox to verify your email.'], 401);
                }
                
                if(auth()->user()->is_admin == 1) {
                    //success response with all user details
                    return response()->json(['success' => 'Successfully logged in', 'user' => auth()->user()], 200);
                    //return response()->json(['success' => 'Successfully logged in', 'name' => auth()->user()->name, 'email' => auth()->user()->email], 200);
                   }
                //if user email is verified
                if(auth()->user()->email_verified_at != null) {
                    //success response with user name and email
                    return response()->json(['success' => 'Successfully logged in', 'user' => auth()->user()], 200);
                }
                
                else {
                    //return redirect to /verified
                    return response()->json(['error' => 'You are not authorized to login'], 401);
                }
                
            }
            
            else {
                return response()->json(['error' => 'Invalid email or password'], 401);
            } 
                break;
        }

              
    }
}
