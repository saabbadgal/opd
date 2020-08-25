<?php

namespace App\Http\Controllers\Dr\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Model\Organization\User;
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
    protected $redirectTo = '/dr-index';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        
        $this->middleware('guest:dr')->except('logout');
    }
    public function showLoginForm( Request $request){

        return view('doctor.login'); 
    }
    public function login(Request $request){
         
        
        // dd(Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password]));
        if(Auth::guard('dr')->attempt(['email'=>$request->email,'password'=>$request->password])) {
            return redirect('associate');
         }else{
            return back()->withErrors(['invalid'=>'Invalid email password']);
         }
     }
    protected function guard() {
        return Auth::guard('dr');
    }
    public function logout(Request $request){
        Auth::guard('dr')->logout();
        return redirect('doctor-login');
    }
}
