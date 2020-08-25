<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Session;

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


    public function login(Request $request){

          $this->validate($request, [
          $this->username() => 'required', 'password' => 'required',
        ]);

         $credentials = $request->only('email', 'password');
      
        if (Auth::attempt($credentials)) {
           
            if(Session::has('book_opd_id'))
            {
                return redirect()->route('appointment',['account'=> Session::get('sub_domain'), 'opd_id'=>Session::get('book_opd_id')]);
            }

            
        }
        return redirect()->route('home');
    }

    public function logout(){

        Auth::logout();
        return redirect()->route('login');
    }
}
