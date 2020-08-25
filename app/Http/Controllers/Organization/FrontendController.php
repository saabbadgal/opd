<?php
namespace App\Http\Controllers\Organization;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Organization\Organization;
use App\Model\Organization\OpdDetail;
use App\Model\Doctor;
use Session;
class FrontendController extends Controller
{

	public function index(){
		$data = Organization::where('id',Session::get('org_id'))->first();
		dump($data->name);
		dump($data->org_dr->toArray());
		foreach($data->org_dr as $key =>$val){

		dump($val->doc->toArray());
		
	    dump($val->doc->org_doctor_opd->toArray(), $val->doc->org_doctor_opd[0]->opd_detail->toArray() );
		}
		dd($data->org_cms->logo );
	}
	public function hospital(){
		$data = Organization::where('id',Session::get('org_id'))->first();
		return view('hospitalprofile',compact('data'));
	}
	public function doctor_profile($sub, $id){ 
		
		$doctor = Doctor::where('id', $id)->with('org_doctor_opd')->first(); 
        $days = [1=>'Mon','Tue','Wed', 'Thu','Fri', 'Sat','Sun' ];
        $shifts = [1=>'Morning','After-noon','Evening'];
		return view('doctor_profile',compact('doctor','days','shifts')); 
    }
	}