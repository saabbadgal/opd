<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Model\Doctor;
use App\Model\OrgDoctor;
// use App\Model\Specialist;
use App\Model\Organization\Organization;
// use App\Model\City;
use DB;
use Carbon\Carbon;
// use Schedule;
class SearchController extends Controller
{
    
public function first(){

     $data = Organization::pluck('id','city');
     $city = $data->keys();
     return view('first', compact('city') );
}


public function index(Request $request){

	$city = Organization::pluck('id','city');
	$doc =   Doctor::where(['city'=> $request->city])->get();
	$days = [1=>'Mon','Tue','Wed', 'Thu','Fri', 'Sat','Sun' ];
	$shifts = [1=>'Morning','After-noon','Evening'];
	$serve_city = $city->keys();
	$city=null;
	    if($request->isMethod('post')){
	        if(!empty($request->city)){
	            $city = $request->city;
	        }
	    }
	    $search = true;
     $carbon = Carbon::now();
     return view('search', compact('doc','serve_city','city','search','days','shifts','carbon'));
}

 

// public function get_city_data($id=32){

// $city = Organization::pluck('id','city');
// //$city =  city::where('state_id',$id)->pluck('id','name');
// $city = $city->map(function($item, $key){
// return null;
// });
// return response()->json($city);
// }


// public function get_result($city, $search=null){


// $data = null;
// if(!empty($search)){
// $search = explode('.', $search);
// switch ($search[1]) {
// case 'Specialist':
// $data = Doctor::where(['city'=> $city, 'specialist'=>$search[0]])->paginate(5);
// break;
// case 'Doctor':
// $data = Doctor::where(['city'=> $city, 'name'=>$search[0]])->paginate(5);
// break;
// case 'Hospital':
// $org = Organization::where(['city'=>$city, 'name'=>$search[0]]);
// if($org->exists() && $org->first()->org_dr->isNotEmpty()){
// $dr_id = $org->first()->org_dr->pluck('dr_id');
// $data = Doctor::whereIn('id', $dr_id->toArray() )->paginate(5);
// }
// break;
// }
// }else{
// $data = Doctor::where('city', $city)->paginate(5);
// }
// return view('search_result', compact('data'));
// }


// public function get_opd_schedule($org_id, $user_id){

// $dr = OrgDoctor::where(['org_id'=>$org_id , 'user_id'=>$user_id])->first();
// $sub_domain = Organization::find($org_id)->sub_domain;
// $days = [1=>'Mon','Tue','Wed', 'Thu','Fri', 'Sat','Sun' ];
// $shifts = [1=>'Morning','After-noon','Evening'];
// $schedule = DB::table('org_'.$org_id.'_opds')->join('org_'.$org_id.'_opd_details', 'org_'.$org_id.'_opds.id', '=', 'org_'.$org_id.'_opd_details.opd_id')->where('dr_id', $user_id)->orderBy('org_'.$org_id.'_opd_details.day')->get();
// $opd = $schedule->groupBy('day');
// $opd_id = $schedule[0]->opd_id;
// $boking_url = 'http://'.$sub_domain.'.'.env('MAIN_URL').'/book-appointments/'.$user_id.'/'.$dr->dr_id;
// $shift_ids =  json_decode($schedule[0]->shifts, true);

// if($opd->keys()->contains(date('N'))){
// echo "<script>$('#avail".$org_id."".$user_id."').text('Available Today')</script>";
// }
// echo "<script>$('.link_".$org_id."".$user_id."').attr('href','".$boking_url."')</script>";
// $loginwithid = env('START_URL').''.$sub_domain.'.'.env('MAIN_URL').'/loginwithid';

// return view('opd_schedule', compact('opd','days','shifts','shift_ids','boking_url','loginwithid'));
// days wise
//  foreach ($schedule as $key => $value) {
//       $new[$shifts[$value->shift_id].' '.$value->start_time.' to '.$value->end_time][] = ['day'=> $value->day ,'shift'=> $value->shift_id];
//       // dump( $key , $value);
//  }
//  foreach ($new as $nkey => $nvalue) {
//      foreach ($nvalue as $dkey => $dvalue) {
//         echo $days[$dvalue['day']].'- ';//. '- '.$shifts[$dvalue['shift']];
//      }
//      echo $nkey.'<br>';
//  }
}

 