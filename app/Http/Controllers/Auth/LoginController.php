<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Providers\RouteServiceProvider;

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

    public function attemptLogin($request)
    {
        $remember = $request['remember'] ? true : false;
        $loginRequest = ['email' => $request['username'], 'password' => $request['password']];

        return Auth::attempt($loginRequest, $remember);
    }

    public function login(LoginRequest $request)
    {
        if ($this->attemptLogin($request)) {
            // dd(true);
            return redirect()->route('home')->with('success', 'Logged in successfully!');
        } else {
            dd(false);
            return back()->with('error', 'Incorrect username or password');
        }
    }

    public function logout(Request $request)
    {
        $name = Auth::user()->name;
        
        Auth::logout();

        return redirect('/home')->with('success', 'You are logged out of '. $name);
    }
}
