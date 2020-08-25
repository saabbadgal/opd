<?php

namespace App\Http\Controllers\Organization;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use  App\Model\Organization\Appointment;
use  App\Model\Organization\Shift;
use  App\Model\Organization\Opd;
use  App\Model\Organization\OpdDetail;
use  App\Model\Organization\DelayOpdService;
use  App\Model\Organization\OpdSetting;

use App\User;
use App\OrgPatient;
use App\OrgOpdPat;
use App\PatientAppointment;
use Session;
use Carbon\Carbon;
use DB;
use Auth;
// use App\Events\Opd as Opdevent;

class AppointmentController extends Controller
{

  public function check(){

    dd(Auth::guard('org')->user());

  }


  public function booking_form(Request $request){

    if(!Auth::check()){

      Session::put('book_opd_id',$request->opd_id);

      return redirect()->route('login');
    }

      $request->session()->forget('book_opd_id');
 
      $opd = Opd::find($request->opd_id);
      $doctor     = $opd->main_doctor;
      $opd_detail = $opd->opd_detail;
      $carbon = Carbon::now();
      return view('organization\appointment_form',compact('opd','doctor','opd_detail' ,'carbon')); 

  }


  protected function check_opd_available_timing($data){ 

  return OpdDetail::where($data->except(['_token','date']))->first();
   
  }

  protected function add_opd($token){

      $token = Appointment::where('token_no',$token)->first()->token_no;
      $token_no = $token + 1;

      return $token_no;

  }

protected function check_ongoing_opd($opd_id, $date, $shift_id){
  
      $data = Appointment::where(['opd_id'=>$opd_id,'date'=>$date,'shift_id'=>$shift_id]);
         
         if($data->exists()){
             
             return $data->orderBy('permanent_token','Desc')->first();
         
         }else{
             return false;
         }
  }        
  protected function manage_next_opd($latest_opd, $per_patient_time){

    // dd($latest_opd, $per_patient_time);

   $permanent_token = $latest_opd->permanent_token + 1;   
   
   $temporary_token = $latest_opd->token_no + 1;
   // $time            = $latest_opd->time
    $last_time = new Carbon($latest_opd->time);
    $time =    $last_time->addMinutes($per_patient_time);
     $time = $time->format('h:i');
   return ['token_no'=> $temporary_token,'permanent_token' =>$permanent_token,'time'=>$time];

  }      
 
 protected function new_appointment($data){
  

  $new = new Appointment();
  $new->fill($data);
  $new->patient_id = Auth::id();
  $new->save();

  return view('organization.booking_confirmation')->with(["token"=> "$new->permanent_token", "date"=>"$new->date" , "time" =>"$new->time"]);
 }

  public function book(Request $request){
    
    $shedule = $this->check_opd_available_timing($request);
    $check_ongoing_opd = $this->check_ongoing_opd($request->opd_id, $request->date, $request->shift_id);
    
    if(!empty($check_ongoing_opd)){
          if( $check_ongoing_opd->permanent_token == $shedule->average_patient){
               return ['error' => true, 'message' => 'Token limit exceed then shedule'.$shedule->average_patient];
            }
     $next_opd_data =  $this->manage_next_opd($check_ongoing_opd, $shedule->per_patient_time);
     $new_appointment_data = [$next_opd_data,$request->all(),['org_id' => Session::get('org_id'),'type' => 'n','patient_id' => 13]];
     $new_appointment_data = Collect($new_appointment_data)->Collapse();
     // dd($new_appointment_data );
    $response =  $this->new_appointment($new_appointment_data->toArray());
    dd($response);
     
    }else{
      $new_appointment_data = [$request->all(),['token_no'=>1, 'permanent_token'=> 1, 'time' => $shedule->start_time, 'org_id' => Session::get('org_id'),'type' => 'n','patient_id' => 13]];
        $new_appointment_data = Collect($new_appointment_data)->Collapse();
     
     $response = $this->new_appointment($new_appointment_data->toArray());
      dd($response);
}
 
    // `opd_id`, `patient_id`, `date`, `shift_id`, `token_no`, `permanent_token`, `type`, `time`
          

}

public function switch_shift(Request $request){

 OpdSetting::where('dates' , '<', date('Y-m-d') )->delete();

  if(!empty($request['shifts'])){
    foreach ($request['shifts'] as $key => $value) {
      if($value['active']){
          $active = 1;
        }else{
          $active = 0;
        }
      $setting = OpdSetting::where(['opd_id'=>$request['opd_id'], 'dates'=>date('Y-m-d'),'shift_id'=>$value['id'] ]);
      if($setting->exists()){
        
          $setting->update(['status'=>$active]);
       
      }elseif($value['active']) {
        $opd_setting = new OpdSetting();
        $opd_setting->fill(['opd_id'=>$request['opd_id'], 'dates'=>date('Y-m-d'),'shift_id'=>$value['id'], 'status'=>1]);
        $opd_setting->save();
      } 
    }
  }
    // OpdSetting::where(['opd_id'=>$request['opd_id'], 'dates'=>date('Y-m-d')])->whereNotIn('shift_id', $request['shifts'])->update(['status'=>0]);
  return "ok";
}

protected function get_active_shifts($opd_id){

  $setting =  OpdSetting::where(['opd_id'=>$opd_id, 'dates'=>date('Y-m-d'), 'status'=>1]);
  if($setting->exists()){
    return $setting->pluck('shift_id','shift_id');
  }

  return false;

}

  public function move_down($opd_id, $shift_id, $from_id , $to_id){

    $data = ["opd_id"=>$opd_id, "shift_id"=>$shift_id, "day"=> date('N') ]; 
    $per_patient_time = $this->calculate_time_per_patient($data);
    $from = Appointment::where(["opd_id"=>$opd_id, "shift_id"=>$shift_id, "date"=>date('Y-m-d'), "token_no"=>$from_id]);
    $first  =    $from->first();
    $start_token  = $from_id + 1;

    for ($i= $start_token; $i <= $to_id; $i++) {
       echo " i ".$i;
          $this->update_move_down_token($opd_id, $shift_id, $i, $per_patient_time['per_patient_time']);
      }

    $diff         =     $to_id - $from_id;
    echo " diff". $diff;
    $diff_time    =    ($diff * $per_patient_time['per_patient_time']);
    $new_time     = date('H:i', strtotime("+ $diff_time minutes" , strtotime($first->time)));

    $first = Appointment::find($first->id);
    $first->update(['token_no'=>$to_id, "time"=> $new_time ]);


    $full_detail  = Appointment::orderBy('token_no')->where(["opd_id"=>$opd_id, "shift_id"=>$shift_id, "date"=>date('Y-m-d') ])->get();


          //return view('organization::appointment.test',['data'=>$full_detail]);    
  }

  protected function update_move_down_token($opd_id, $shift_id, $token ,$turn_time){

    dd($opd_id, $shift_id, $token ,$turn_time);

      $appointment = Appointment::where(["opd_id"=>$opd_id, "shift_id"=>$shift_id, "date"=>date('Y-m-d'), "token_no"=>$token]);
      $token_no   = $token - 1;
      echo " minus token".$token_no;
      $app_detail = $appointment->first();
      // dd($opd_id, $shift_id, $token ,$turn_time , $app_detail);
      $new_time = date('H:i', strtotime("-"+ $turn_time +"minutes" , strtotime($app_detail->time))); 
      $appointment->update(["token_no"=>$token_no, "time"=> $new_time ]);
  }

  
    
    /**
     * [change_date_format description]
     * @param  [type] $date   [description]
     * @param  [type] $format [description]
     * @return [type]         [description]
     */
    protected function change_date_format($date, $format=null){
        $time = strtotime($date);
        if(!empty($format)){
          return date($format, $time);
        }else{
          return date('Y-m-d', $time);
        }
    }
    /**
     * [get_day_from_date description]
     * @param  [type] $date [description]
     * @return [type]       [description]
     */
    protected function get_day_from_date($date){
      return date('N', strtotime($date));
    }
    
    protected function cal_difference_in_time($finish_time, $start_time){
        $finish_time = Carbon::parse($finish_time);
        $start_time =  Carbon::parse($start_time);
        return $finish_time->diff($start_time)->format('%H:%I:%S');
    }

    /**
     * [delay_in_appointment description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function delay_in_appointment(Request $request)
    {
      $req = $request->all();
      $req['date']  = $this->change_date_format($req['date']);
      $req['day']   = $this->get_day_from_date($req['date']);
      $cal_time = $this->calculate_time_per_patient($req);

      if($request->type == 'b'){
        $req['start_time'] = null;
        $req['delay_time'] = $this->cal_difference_in_time($request->to, $request->from);
      }else{
        $req['delay_time'] = $this->cal_difference_in_time($req['start_time'], $cal_time['start_time']);
      } 

      $delay = new DelayOpdService();
      $delay->fill($req);
      $delay->save();
      if($request->type=='s'){

        $data = Appointment::select(['id', 'opd_id', 'shift_id', 'time', 'token_no'])->where(['opd_id'=> $request->opd_id, 'date'=>$req['date'] , 'shift_id'=>$request->shift_id,'status'=>0 ])->orderBy('token_no','asc')->get();
         foreach ($data as $key => $value) {
          if($key==0){
              Appointment::find($value->id)->update(['time'=>$request->start_time]);
          }else{
            $add_mintue =  (($value->token_no -1) * $cal_time['per_patient_time']);
            $new_time = date('H:i', strtotime('+'.$add_mintue.' minutes' , strtotime($request->start_time))); 
            Appointment::find($value->id)->update(['time'=>$new_time]);         
          }

        }

      }else{

         $data = Appointment::select(['id', 'opd_id', 'shift_id', 'time', 'token_no'])->where(['opd_id'=> $request->opd_id, 'date'=>$req['date'] , 'shift_id'=>$request->shift_id,'status'=>0 ])->where('time','>=',$request->from)->orderBy('token_no','asc')->get();
         dump($data->toArray());
         foreach ($data as $key => $value) {
            if($key==0){
              $assume_token = $value->token_no;
                Appointment::find($value->id)->update(['time'=>$request->to]);
            }else{
              $add_mintue =  (($value->token_no - $assume_token)  * $cal_time['per_patient_time']);
              $new_time = date('H:i', strtotime('+'.$add_mintue.' minutes' , strtotime($request->to))); 
              Appointment::find($value->id)->update(['time'=>$new_time]);         
            }
        }

      }

    }
    protected function check_opd_today($opd_id){

        return OpdDetail::where(['opd_id'=>$opd_id, 'day'=>date('N')])->exists();
    }
    /**
     * first come at index .
     *@id  is opd id
     * @return to view
     */
    public function index($id){

// dd(Schedule::today_shifts());
        if($this->check_opd_today($id)){
            $opd_detail = Opd::select(['id','name','dr_id','doc_id'])->with('doctor_detail:id,name')->whereId($id)->first();
           $switch = $ui = true;

            // $opd_data = Opd::select(['id','name','dr_id'])->with('doctor_detail:id,name')->get();
          return view('organization::appointment.index', compact('id', 'opd_detail', 'ui', 'switch'));   
        }else{

          return view('organization::appointment.noopd');
        }
    }

    protected function appointment_count($id){

     return Appointment::where(['opd_id'=> $id, 'date'=> date('Y-m-d') ])->groupBy('shift_id')->selectRaw('count(id) as total, shift_id' )->pluck('total', 'shift_id'); 
    }

    /**
     * appointment_data .
     *@id  is opd id
     * @return current date opd data
     */
    public function appointment_data($id, $shift_id=1){
       
      // $data['detail']    =  Opd::select(['id','name','dr_id'])->with('doctor_detail:id,name')->where('id',$id)->first();
      $active_shifts = $this->get_active_shifts($id);

      $shift = $this->shift_details($id);
      $data['shifts']    =  $shift['shift'];
      foreach ($shift['shift'] as $key => $value) {

        $data['switch_shift'][$key]['id'] = $key;
        $data['switch_shift'][$key]['name'] = $value;
        $data['switch_shift'][$key]['active'] = !empty($active_shifts[$key]);
        # code...
      }

      $data['shift_detail']    =  $shift['shift_detail'];
      $data['app_count'] =  $this->appointment_count($id);

    if(!empty($active_shifts)){
      $data['appoint']   = Appointment::select(['id', 'shift_id', 'opd_id', 'patient_id', 'token_no', 'permanent_token', 'opd_id', 'status', 'date', 'time'])->with(['patients:id,name', 'shift:id,name'])->where(['opd_id'=> $id, 'date'=> date('Y-m-d') ])->whereNotIn('status',[1,3])->whereIn('shift_id', $active_shifts)->orderBy('token_no','asc')->get()->groupBy('shift_id');
      // dump($data['appoint']);
    }else{
      $data['appoint'] =[];
    }

        return  request()->json(200, $data);
    }
    
    /**
     * @param  Request date and shift
     * @param  [id], opd id
     * @return json data of appoint use vue
     */
    public function  filter(Request $request, $id){
        $request['date'] = date('Y-m-d', strtotime($request->date));
        $filter = array_filter($request->except(['_token']));
        if($filter){
          $shift = $this->shift_details($id);
          $data['shifts']    =  $shift['shift'];
           
            $data['appoint']= Appointment::with(['patients:id,name', 'shift:id,name'])->where('opd_id', $id)->where($filter)->orderBy('token_no','asc')->get();
            return request()->json(200, $data);
        }
        return "nooo";
    }
  protected function check_availablity($data) {

      $average_patient_attend = OpdDetail::where(['opd_id'=>$data['opd_id'], 'day'=> $data['day'], 'shift_id'=> $data['shift_id']])->first();
      if(empty($average_patient_attend)){
        return ['error'=>'No opd. Book appointment according to schedule.'];

      }
      if($data['date']== date('Y-m-d') &&  $average_patient_attend->end_time < date('H:i')){
        return ['error'=>'Time passed away. Book Appointment on next schedule.'];
      }

      $total_appointment = Appointment::where(['date'=>$data['date'], 'shift_id'=>$data['shift_id'], 'opd_id'=>$data['opd_id'] ])->whereNotIn('status',[3])->count();

      if($total_appointment >= $average_patient_attend->average_patient) {
        return ['error'=>'Booking exceed the limit'];
      }

  }

    /**
     * @param  Quick registration and booking appointment
     * @return return booking
     */
 public function create(Request $request)
    {
      
        $data =  $request->all();
        $stringtotime = strtotime($data['date']);
        $data['date'] = date('Y-m-d',$stringtotime);
        $data['day'] = date('N', $stringtotime);
        //$re = $this->check_appointment($data); 
        if(!empty($request->by=='web')){
          $request->validate(['shift_id'=>'required',
                              'date'=>'required'],['shift_id.required'=>'The Shift field is required.']);
          $check = $this->check_appointment($data);
          if(!empty($check['error'])) {
                return back()->with('error',$check['error']);
          }

          $availablity = $this->check_availablity($data);
          if(!empty($availablity['error']))
            return back()->with('error',$availablity['error']);
          }

        if(empty($request['exist_user_id'])){
          if(User::where('user_name', $data['user_name'])->count()>0){
              $response['error'] = "This User name Not Exist!";
              return request()->json(200, $response);
          }else{
            $user = User::create([
                          'name' => $data['name'],
                          'user_name' => $data['user_name'],
                          'email' => $data['email'],
                          'password' => bcrypt(123456),
                          ]);
            $patient_id = $user->id;
          }
          
        }else{
          $patient_id = $request['exist_user_id'];
        }
        $org_associate_id =  $this->associate_patient_to_org($patient_id);
        $org_pat_opd_id   =  $this->associate_org_pat_to_opd_shift($org_associate_id, $data);
        $booking_response =  $this->book_appointment($data, $patient_id);

        if(!isset($booking_response['error'])) {
           $this->org_patient_appointment($org_pat_opd_id, $booking_response['appointment_id'], $data['date'], $patient_id);
        }
        if(!empty($request->by=='web')){

          Session::flash('sucess_book','your booking is confirm with following details.');
          return redirect()->route('success.appointment',['id'=>$booking_response['appointment_id'] ]);
        }

       return request()->json(200, $booking_response);
    }



    protected function book_appointment($data, $patient_id=null){

      dd($patient_id);

      if($data['type']=='n'){
           $response =  $this->check_appointment($data);
           if(isset($response['error'])){
                return $response;
           }
          $generate = $this->generate_token_time($data);
          
           if($generate['time'] < date('H:i') ){
              $generate['time'] = date('H:i');
            }
        }
            $appointment = new Appointment();
            $appointment->patient_id = $patient_id;
            $appointment->opd_id = $data['opd_id'];
            $appointment->date = $data['date'];
            $appointment->shift_id = $data['shift_id'];
            $appointment->type = $data['type'];

            if($data['type']=='e'){
                $appointment->permanent_token = $this->recent_token($data);
                $previous_appointment = $this->get_appointment_id_from_token($data); 

                $this->after_emergency_updation($data, $previous_appointment->token_no);
                $appointment->token_no = $previous_appointment->token_no;
                $appointment->time = $previous_appointment->time;
            }else{
                $appointment->token_no = $generate['token_no'];   
                $appointment->permanent_token = $generate['permanent_token'];
                $appointment->time = $generate['time'];
            }
            $appointment->save();
            if($data['date'] == date('Y-m-d')){
               Event(new Opdevent(['opd_id'=>Session::get('org_id').'_'.$data['opd_id'].'_'.$data['shift_id']]));
            }
            $response['success'] = "successfully appointment book";
            $response['appointment_id'] = $appointment->id;
            return $response;
       
    }
 


    public function associate_patient_to_org($patient_id){

        $checkOrgPatient = OrgPatient::where(['patient_id'=> $patient_id, 'org_id'=> Session::get('org_id') ]);
        if($checkOrgPatient->exists()){
            return $checkOrgPatient->first()->id;
        }else{
            $orgPatient = new OrgPatient();
            $orgPatient->org_id = Session::get('org_id');
            $orgPatient->patient_id = $patient_id;
            $orgPatient->save();
            return $org_patientent_id = $orgPatient->id;
        }
    }



    protected function associate_org_pat_to_opd_shift($org_pat_id, $data){
        
        $opd_add_check = OrgOpdPat::where(['opd_id'=> $data['opd_id'], 'shift_id'=>$data['shift_id'], 'org_pat_id'=>$org_pat_id ]);
        if($opd_add_check->exists()){
          return $opd_add_check->first()->id;
        }
        $opd_add =  new OrgOpdPat();
        $opd_add->opd_id = $data['opd_id'];
        $opd_add->shift_id  = $data['shift_id'];
        $opd_add->org_pat_id  = $org_pat_id;
        $opd_add->save();
        return $opd_add->id;

    }



      protected function org_patient_appointment($org_opd_pat_id, $appointment_id, $appointment_date, $patient_id ){

        $patientAppointment =  new PatientAppointment();
        $patientAppointment->org_opd_pat_id =  $org_opd_pat_id;
        $patientAppointment->appointment_id =  $appointment_id;
        $patientAppointment->appointment_date =  $appointment_date;
        $patientAppointment->patient_id =  $patient_id;
        $patientAppointment->save();
        
    }

  

    public function update_appointment($aid, $type){

        $delay_check = False;
        $data = Appointment::select(['opd_id', 'token_no', 'shift_id', 'date'])->where('id',$aid)->first();
        $data['opd_id'] =  $data->opd_id;
        $data['day'] =  date('N');

        $time = $this->calculate_time_per_patient($data);

        $add_time =  intval(ceil($time['per_patient_time']));

         $delay_query = DelayOpdService::where(['opd_id'=>$data['opd_id'] , 'shift_id'=>$data['shift_id'], 'date'=>$data['date'] ,'type'=>'b']);

        if($delay_query->exists()){
            $delay_check = true;
            $delay_data = $delay_query->pluck('to','from'); 
          }
        
           $appointment_data = Appointment::select(['id', 'opd_id', 'token_no','time','shift_id', 'date'])->where(['opd_id'=>$data['opd_id'],  'date'=>$data['date'], 'shift_id'=>$data['shift_id'], 'status'=>0])->where('token_no',  '>', $data['token_no'])->orderBy('token_no','asc')->get();

        if($type=='start'){
            Appointment::where('id',$aid)->update(['time'=>date("H:i"), 'status'=>4]);
        }elseif($type=='end'){
            Appointment::where('id',$aid)->update(['status'=>1]);
            $data['token_no'] = $data['token_no'] +1; 
        }

        foreach ($appointment_data as $key => $value) {

            if($data['token_no'] == $value->token_no){
                $new_time = date("H:i");
            }else{
                $add_mintue = ($value->token_no - $data['token_no']) * $add_time;
                $new_time = date("H:i", strtotime('+'.$add_mintue.' minutes', strtotime(date("H:i"))));
            }

            if($delay_check){
              $delay_result =false;
                foreach($delay_data as $from => $to){
                  if($from >= $new_time or $to >= $new_time){
                      $delay_result = True; 
                  }
                }

                if($delay_result){
                  break;
                }
              
            }
           Appointment::where(['id'=>$value['id']])->update(['time'=> $new_time , 'token_no'=>$value['token_no'] ]);
        }
          Event(new Opdevent(['opd_id'=> Session::get('org_id').'_'.$data->opd_id.'_'.$data['shift_id']]));
    }
    /**
     * @param  $id = opd id
     * @return shifts related to opd
     */
    protected function shift_details($id){
        // $opd = Opd::select(['shifts','id'])->where('id', $id)->first();
         $data['shift_detail'] = $shift =  OpdDetail::orderBy('shift_id')->where(['opd_id'=>$id, 'day'=>date('N')])->get(); //$shift = $opd->opd_detail_shift->where('day',date('N'));//->orderBy('shift_id');
         $shift_id = $shift->pluck('shift_id')->toArray();
        // dump($shift_id);
          // $shift_ids = json_decode($shift_id, true);
        $data['shift'] = Shift::whereIn('id', $shift_id)->pluck('name','id');
        return $data;
    }

  

    protected function after_cancel_token_time_adjust($appoint_data){
        
       $data = Appointment::where(['date'=>$appoint_data->date, 'opd_id'=>$appoint_data->opd_id, 'shift_id'=>$appoint_data->shift_id, 'status'=>0 ])->where('token_no', '>', $appoint_data->token_no )->get();
       
       $appoint_data['day'] = date('N', strtotime($appoint_data->date));
        $add_time = $this->calculate_time_per_patient($appoint_data);
       foreach ($data as $key => $value) {
            $new_time="";
            $new_time = date("H:i", strtotime('-'.$add_time['per_patient_time'] .'minutes', strtotime($value->time) ));
            Appointment::whereId($value->id)->update(['time'=>$new_time]);
       }
        Appointment::where(['date'=>$appoint_data->date, 'opd_id'=>$appoint_data->opd_id, 'shift_id'=>$appoint_data->shift_id, 'status'=>0 ])->where('token_no', '>',$appoint_data->token_no )->decrement('token_no');

    }



    public function change_appointment_status($id, $status){
        if($status==3){
            $appoint_data = Appointment::whereId($id)->first();
            $this->after_cancel_token_time_adjust($appoint_data);
            
            Event(new Opdevent(['opd_id'=> Session::get('org_id').'_'.$appoint_data->opd_id.'_'.$appoint_data['shift_id']]));

            }
        Appointment::whereId($id)->update(['status'=>$status]);
        return request()->json(200);
    }


    protected function opd_detail($data){
        $detail = OpdDetail::where(['opd_id'=>$data['opd_id']  , 'shift_id'=>$data['shift_id'] , 'day'=>$data['day'] ]);
        if(!$detail->exists()){
            return;
        }
        return $detail->first();
 
    }


    protected function check_appointment($data){

        $response = null;
        $current  =  Carbon::now();
        $current_date = $current->toDateString();
        // dd($data['date'] , $current_date);
        // 1 no past appoint current > appointment date then Error
        if($data['date'] < $current_date){
            $response['error'] =  "Choose correct date.";
        }
        $opd_detail = $this->opd_detail($data);
        if(!$opd_detail){
            $response['error'] =  "No opd on this day.";
        }
        return $response;
     
    }



    protected function calculate_mintue($from, $to){
      $time = new Carbon($from);
      $shift_end_time =new Carbon($to);
      $totalDuration = $time->diffInMinutes($shift_end_time, false);
      return $totalDuration;
   }



    protected function calculate_time_per_patient($data){

        $detail = OpdDetail::where(['opd_id'=>$data['opd_id']  , 'shift_id'=>$data['shift_id'] , 'day'=>$data['day'] ])->first();
        //$time = $this->calculate_mintue($detail->start_time, $detail->end_time);
        $opd_detail['start_time'] = $detail->start_time;   
        $opd_detail['end_time'] = $detail->end_time;  
        $opd_detail['per_patient_time'] = $detail->per_patient_time; //intval(ceil($time/$detail->average_patient));
        $opd_detail['average_patient_attend'] = $detail->average_patient; //intval(ceil($time/$detail->average_patient));
        return $opd_detail;
    }



    protected function generate_token_time($data){

        $opd_detail  = $this->calculate_time_per_patient($data);
        $appointment = Appointment::where(['opd_id' => $data['opd_id'], 'date' => $data['date'] , 'shift_id' => $data['shift_id'] ]);//->whereIn('status',[0,4]);

        if($appointment->exists()){

            $temp_token_data = Appointment::where(['opd_id' => $data['opd_id'], 'date' => $data['date'] , 'shift_id' => $data['shift_id'] ])->select(['token_no', 'time'])->orderBy('token_no','desc')->first();
            //->whereNotIn('status',[3])
            $generate['permanent_token']  = $appointment->select('permanent_token')->orderBy('permanent_token','desc')->first()->permanent_token +1;

            $generate['token_no'] = $temp_token_data->token_no + 1;
            $last_time = new Carbon($temp_token_data->time);
            $time =    $last_time->addMinutes($opd_detail['per_patient_time']);

            if($time->format('H:i') < date('H:i')){
              $generate['time'] = date('H:i');
            }else{
                $generate['time'] = $time->format('H:i');
            }
            
        }else{
          if($opd_detail['start_time'] < date('H:i')){
             $generate['time'] = date('H:i');
          }else{
            $generate['time'] = $opd_detail['start_time'];
          }
            $generate['token_no'] = $generate['permanent_token'] = 1;
        }

        return $generate;
    }
    /**
     * [recent_token get last assign token to appointment]
     * @param  [type] $data [parameter to get result ]
     * @return [int]       [latest token]
     */
    protected function recent_token($data){
        $get_token = Appointment::select(['id', 'permanent_token'])->where(['opd_id' => $data['opd_id'], 'date' => $data['date'] , 'shift_id' => $data['shift_id'] ])->orderBy('permanent_token','desc')->first();
        // dd($data, $get_token);
        return $get_token['permanent_token'] +1; 
    }



    protected function get_appointment_id_from_token($data){

       return Appointment::select(['id','token_no', 'time'])->where(['opd_id' => $data['opd_id'], 'date' => $data['date'] , 'shift_id' => $data['shift_id']  , 'token_no' =>$data['emergeny_token'] ])->first();
    }


    protected function after_emergency_updation($data, $previous_token ){

        Appointment::where([ 'date'=>$data['date'], 'opd_id'=>$data['opd_id'], 'shift_id'=>$data['shift_id'], 'status'=>0 ])->where('token_no', '>=', $previous_token)->increment('token_no');
        
        $appointment_data = Appointment::where([  'date'=>$data['date'], 'opd_id'=>$data['opd_id'], 'shift_id'=>$data['shift_id'], 'status'=>0 ])->where('token_no', '>', $previous_token )->get();

        $add_time = $this->calculate_time_per_patient($data);
       foreach ($appointment_data as $key => $value) {
            $new_time="";
            $new_time = date("H:i", strtotime('+'.$add_time['per_patient_time'] .'minutes', strtotime($value->time) ));
            Appointment::whereId($value->id)->update(['time'=>$new_time]);
       }
    }

    

    public function patient_validator($type, $value){

        if(User::where('user_name', $value)->exists()){
            $response['res']=false;
        }else{
             $response['res']=true;
        }
        return request()->json(200, $response);
    }



    public function exist_user_validation($user_name){
      if(User::where('user_name', $user_name)->exists()){
            $response['res']=true;
            $response['user_id'] = User::select('id')->where('user_name', $user_name)->first()->id;

        }else{
             $response['res']=false;
        }
        return request()->json(200, $response);

    }

    
}
