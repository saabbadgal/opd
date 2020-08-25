<?php 

namespace App\Helpers;

use App\Model\Doctor;
use DB;
use App\Model\Organization\Opd;
/**
* 
*/
class DrSchedule
{
	public static function get_dr_by_id($id){
		return Doctor::find($id);
	}

	public static function check_opd($org_id, $user_id){

		$check = DB::table('org_'.$org_id.'_opds')->where(['dr_id'=>$user_id, 'status'=>1]);
		return $check->exists();
	}

	public static function schedule($org_id, $user_id )
	{//
		// return 123;

		$schedule = DB::table('org_'.$org_id.'_opds')->join('org_'.$org_id.'_opd_details', 'org_'.$org_id.'_opds.id', '=', 'org_'.$org_id.'_opd_details.opd_id')->where('dr_id', $user_id)->get();
    	return	$opd = $schedule->groupBy('day'); 
	} 

	public static function check_today_opd($org_id, $opd_id){
		return DB::table('org_'.$org_id.'_opd_details')->where(['opd_id'=>$opd_id, 'day'=>date('N')])->get();
	} 

	public static function dr_appointment_count($org_id, $opd_id){
		return DB::table('org_'.$org_id.'_appointments')->select(DB::raw('count(*) as appoint_count, shift_id'))->where(['opd_id'=>$opd_id, 'date'=>date('Y-m-d')])->groupBy('shift_id')->get();//->get();
	}

	public static function today_schedule($org_id, $user_id){

		$schedule = DB::table('org_'.$org_id.'_opds')->join('org_'.$org_id.'_opd_details', 'org_'.$org_id.'_opds.id', '=', 'org_'.$org_id.'_opd_details.opd_id')->where(['dr_id'=> $user_id, 'org_'.$org_id.'_opds.status'=>1])->where('org_'.$org_id.'_opd_details.day',date('N'))->get();


    	return	$opd = $schedule->groupBy('day');

	}

public static function today_shifts($user_id){

		$opd 		= Opd::select(['id'])->where('dr_id',$user_id)->first();
		$opd_detial = $opd->opd_detail->where('day',date('N'))->pluck('shift_id')->toArray();
	 	return ['shift'=>$opd_detial];

}

	public static function shifts(){
	    	return [1=>'Morning','After-noon','Evening'];
	}


	public static function days(){
			return [1=>'Mon','Tue','Wed', 'Thu','Fri', 'Sat','Sun' ];

	}
	
	
}