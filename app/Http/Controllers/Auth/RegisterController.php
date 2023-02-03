<?php

namespace App\Http\Controllers\Auth;

use App\Models\Otp;
use App\Models\User;
use App\Mail\VerifyEmail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = 'email/verify';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    //register user for api
    public function registerApi(Request $request)
    {
        //$input = $request->all();
        //dd($request->all());
        $input = $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        //check if email already exist
        $user = User::where('email', $input['email'])->first();
        if ($user) {
            return response()->json([
                'error' => 'Email already exist',
                'status' => '0',
            ], 401);
        } 
        else {
            $user = User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
                'login_type' => 'Email',
            ]);

            $name = $input['name'];
            //send email verify at 
            //generate 6 digit token
            $token = mt_rand(100000, 999999);
            $email = $user->email;

            Mail::to($request->email)->send(new VerifyEmail($token, $email));

            //Save the token to the database
            Otp::create([
                'token' => $token,
                'email' => $email,
            ]);

            //success message for user to verify their email
        $success = "Welcome $name, A verification code has been sent to $email.";

        //$success['name'] = $user->name;
        return response()->json([
            'success' => $success,
            'status' => '1',
        ], 200);
       
        }        
    }
}
