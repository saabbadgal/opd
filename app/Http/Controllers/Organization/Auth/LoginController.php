<?php

namespace App\Http\Controllers\Organization\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Model\Organization\User;
use Illuminate\Http\Request;
use Auth;
use Session;
use Illuminate\Support\Facades\Crypt;
use Hash;

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
    protected $redirectTo = '/dashboard';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest:org')->except('logout');
    }
    public function showLoginForm( Request $request){
 
        
        return view('organization.login'); 
    }
    public function login(Request $request){


       //dd( Hash::make(12345678));

        // dd(Auth::guard('org')->loginUsingId(2));

        // dd(Auth::guard('org')->attempt(['email'=>$request->email,'password'=>$request->password]));

        if(Auth::guard('org')->attempt(['email'=>$request->email,'password'=>$request->password])) {
            return redirect()->route('check',['account'=>Session::get('sub_domain')]);
         }else{
            return back()->with('message','User Email Password Not Valid 1 .');
         }
     }

     public function loginwithid(Request $request){


        $decrypted_user_id = Crypt::decryptString($request->user_id);
       // if(Session::has('temp_dr_token') && Session::get('temp_dr_token') = $request->token){

            if(Auth::guard('org')->loginUsingId($decrypted_user_id)) {
                return redirect()->route('org.dashboard');
             }else{
                return back();
             }

        // }else{

        //     dd('something goes wrong');
        // }

       
     }

    protected function guard() {
        return Auth::guard('org');
    }
    public function logout(Request $request){
        
     

        Auth::guard('org')->logout();
        return redirect('admin/login');
    }
}
