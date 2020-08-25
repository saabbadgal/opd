<?php

namespace App\Http\Controllers\Dr;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;


class DoctorLoginController extends Controller
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
    // public function login(Request $request){
    //     dd($request->all());

    // }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/dr-index';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
   
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }

    // protected function guard()
    // {
    //   return Auth::guard('dr');
    // }
      public function showLoginForm() {
    return view('doctor.login');
  }
    public function login(Request $request){

        $username = $request->user_name; //the input field has name='username' in form
        $password = $request->password; //the input field has name='username' in form

        if(filter_var($username, FILTER_VALIDATE_EMAIL)) {
            //user sent their email 
            Auth::guard('dr')->attempt(['email' => $username, 'password' => $password]);
        } else {
            //they sent their username instead 
            Auth::guard('dr')->attempt(['email' => $username, 'password' => $password]);
        }

        //was any of those correct ?
        if ( Auth::guard('dr')->check() ) {
            //send them where they are going 
            return redirect()->route('dr.index');//intended('home');
             


            
             
            //dd('logined ing');
        }else{

            //dd('not login');
        }

        //Nope, something wrong during authentication 
        return redirect()->back()->withErrors([
            'credentials' => 'Please, check your credentials'
        ]);

    }

       


    // public function redirectPath()
    // {
    //     if(session()->has('_previous')){
    //         $returnTo  =  session('_previous.url');
    //     }else{
    //         $returnTo = $this->redirectTo;
    //     }
    // return  $returnTo;
    // }
}
