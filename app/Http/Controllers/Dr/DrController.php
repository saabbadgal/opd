<?php

namespace App\Http\Controllers\Dr;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Doctor;
use App\Model\OrgDoctor;
use Auth;
use Session;
use Modules\Organization\Entities\User;
use Illuminate\Support\Facades\Crypt;
use App\Model\City;
use Datetime;
use Schedule;
class DrController extends Controller
{
    /**
     * [index description]
     * @return [type] [description]
     */
    

    public function schedule(){

    	$orgs = OrgDoctor::where(['dr_id'=>Auth::guard('dr')->user()->id])->get();
    	$no_schedule = true;
    	return view('doctor.schedule',compact('orgs','no_schedule'));
    }

	public function index()
	{
		dd(Auth::guard('dr')->User());
	}

	public function dr_signup_form(){

		return view('doctor.signup');
	}
	/**
	 * [create description]
	 * @return [type] [description]
	 */
	public function create(Request $request){

		$request->validate(['email'=>'required|unique:doctors',
							'name'=>'required',
							'phone'=>'required',
							'password'=>'required|min:6'
						]);
		$dr = new Doctor();
		$dr->name = $request->name;
		$dr->email = $request->email;
		$dr->phone = $request->phone;
		$dr->password =  bcrypt($request['password']);
		$dr->save();
		
		$uid = 12398765 + ($dr->id*2);
		$secret_id = substr($request->email, 0,3).''.$uid;
		Doctor::where('id',$dr->id)->update(['secret_id'=>$secret_id]);
		if(Session::has('org_id')){
			$org_user = new User();
			$org_user->name = $request->name;
			$org_user->email = $request->email;
			$org_user->password =  bcrypt($request['password']);
			$org_user->type = 'dr';
			$org_user->role_id = 2;
			$org_user->save();
			
			$org_id = Session::get('org_id');
			$dr_org = new OrgDoctor();
			$dr_org->dr_id = $dr->id;
			$dr_org->org_id = $org_id;
			$dr_org->user_id = $org_user->id;
			$dr_org->save();
		}
		Auth::guard('dr')->loginUsingId($dr->id);
	return back();
	}

	protected function cal_year($date) {
		$from = new Datetime($date);
		$to = new Datetime();
		return $from->diff($to)->y;
	}


	public function profile($id=null){

		// dump(Schedule::schedule());
		$edit_link_show = $doctor=null;
		if(!empty($id)){
			$doctor = Doctor::find($id);
		} elseif (Auth::guard('dr')->check()) {
			$doctor = Auth::guard('dr')->user();
			$edit_link_show = true;
		}

		if(Auth::guard('dr')->check() && !empty($id)) {
			if(Auth::guard('dr')->user()->id != $id){
				$edit_link_show=null; 
			}else{
				$edit_link_show=true;
			}
		}
		
		if(!empty($doctor)) {
			if(!empty($doctor->start_experience)){
				$doctor['experience'] =  $this->cal_year($doctor->start_experience);
			}if(!empty($doctor->dob)){
				$doctor['age'] = $this->cal_year($doctor->dob);
			}
 		}
		return view('doctor.profile.dr_profile' , compact('doctor','edit_link_show'));
	}

	public function edit_profile(){

		
		$model = Auth::guard('dr')->user();
		$address = true;

		return view('doctor.edit_dr_profile',compact('model','address'));
	}

	public function update_profile(Request $request){

		$dr_id = Auth::guard('dr')->user()->id;
		if ($request->hasFile('profile_pic')) {
		    $this->validate($request, [
		        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
		       ]); 

		        $image = $request->file('profile_pic');
		        $image_name = $dr_id.'.png';
		        $destinationPath = public_path('/img/doctor/');
		        $image->move($destinationPath, $image_name);
				Doctor::find($dr_id)->update(['profile_pic'=> $image_name]);
		}

		if(!empty($request['dob'])){
			$dob = date('Y-m-d',strtotime($request->dob));
			$request['dob'] = $dob;
		}

		if(!empty($request['start_experience'])){
			$start_experience = date('Y-m-d',strtotime($request->start_experience));
			$request['start_experience'] = $start_experience;
		}
		
		Doctor::find($dr_id)->fill($request->except('profile_pic'))->save();
			
		return redirect()->route('dr.profile');
	}

	public function associate_to_org(Request $request){
		//array_except($array, ['price']);
		//dd($request->all());

		$org_user = new User();
			$org_user->dr_id = $request->id;
			$org_user->name = $request->name;
			$org_user->email = $request->email;
			$org_user->password =  $request->password;
			$org_user->type = 'dr';
			$org_user->role_id = 2;

			$org_user->save();
			
			$org_id = Session::get('org_id');
			$dr_org = new OrgDoctor();
			$dr_org->dr_id = $request->id;
			$dr_org->org_id = $org_id;
			$dr_org->user_id = $org_user->id;
			$dr_org->save();

		return back();
	}

	
	public function dr_associate_org(){

		$doctor = Auth::guard('dr')->User();
		$associate = null;
		// if($doctor->dr_org->isNotEmpty()){
		// 	foreach ($doctor->dr_org as $key => $value) {
		// 		$encrypted_user_id = Crypt::encryptString($value->user_id);
		// 		$associate[] = ['name' => $value->org_detail->name ,
		// 					'type' =>$value->org_detail->type, 
		// 					'user_id'	=>$encrypted_user_id,
		// 					//'org_id'	=>$value->org_id,
		// 					'sub_domain'=> $value->org_detail->sub_domain,
		// 					];
		// 	}
		// }
		return view('doctor.associate_org', compact('doctor','associate'));

	}

	public function quick_login_to_associate(Request $request){

		// dd($request->all());
		// Session::put('org_id', $request->org_id);

		if(Auth::guard('org')->loginUsingId($request->user_id)) {

			dump(Auth::guard('org')->User());

           // return redirect($request->sub_domain.'.opd.com/admin/dashboard');//->route('org.dashboard');

         }else{
            return back();
         }

		dd($request->all());

	}
}
