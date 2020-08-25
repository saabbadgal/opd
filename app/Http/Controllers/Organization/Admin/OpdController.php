<?php

namespace App\Http\Controllers\Organization\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Organization\Opd;
use App\Model\Organization\OpdDetail;
use App\User;
use App\Model\Organization\Shift;
//use App\Model\Organization\Entities\Doctor;
use Session;

class OpdController extends Controller
{
  	public function list($id=null){
        
    	$data = Opd::where('org_id',Session::get('org_id'))->get();

    	// $doctor = Doctor::where(['status'=>1])->pluck('name','id');
    	// $shift = Shift::where('status',1)->pluck('name','id');
        $datatable = true; 
        return view('organization.admin.opd.list',compact('data', 'datatable'));
    }

    public function update(Request $request){
        $data = $request->all();
        $request->validate([
            // 'name' => 'required|max:255',
            'dr_id' => 'required',
        ],['dr_id.required'=>"The Doctor field is required"]);

        if(empty($request['day']) || empty($request['day_shift']) ){
            return back()->withInput($request->only('name','dr_id'))->with('new_error','Fill up the opd Schedule form');
        }
        $data = $request->all();
        unset($data['day'] , $data['day_shift'] );

        if(empty($this->opd_validation($request['day'] , $request['day_shift'], $data ))) {
            return back()->withInput($request->only('name','dr_id'))->with('new_error','Fill up the opd schedule correct ');
        }
        // dd($data , $request->all()); 
             if(!empty($data['opd_id']))
             {
                $opd = Opd::find($data['opd_id']);
             }else{
                $opd = Opd::firstOrNew(['name'=>$request['name'], 'dr_id'=>$request['dr_id']]);
             }
            $opd->fill($request->all());
            $opd->save();
            $opd_id = $opd->id;
            foreach ($data as $daykey => $day_value) {
                if(is_array($day_value)){
                foreach ($day_value as $shift_key => $shift_value) {
                    echo $daykey.' day';
                    if(!empty($new_data = array_filter($shift_value))){

                         if(!in_array($daykey, $request['day'])){
                            OpdDetail::where(['opd_id'=>$opd_id, 'day'=>$daykey])->delete();
                            continue;
                         }else{
                            if(!in_array($shift_key, $request['day_shift'][$daykey])){
                                OpdDetail::where(['opd_id'=>$opd_id, 'day'=>$daykey,'shift_id'=>$shift_key])->delete();
                                continue;
                            }
                         }


                        $opd_detail = OpdDetail::firstOrNew(['opd_id'=>$opd_id, 'day'=>$daykey,'shift_id'=>$shift_key]);
                        $opd_detail->opd_id = $opd_id;
                        $opd_detail->day = $daykey;
                        $opd_detail->shift_id = $shift_key;
                        $opd_detail->start_time = $new_data['start_hour'].':'.$new_data['start_min'];
                        $opd_detail->end_time = $new_data['end_hour'].':'.$new_data['end_min'];
                        $opd_detail->average_patient = $new_data['average_patient'];
                        $opd_detail->per_patient_time = $new_data['per_patient_time'];
                        $opd_detail->save();
                           
                        $shifts[$shift_key] = $shift_key;
                    }
                
                }}
            }

            $update_shift = Opd::find($opd_id);
            $update_shift->shifts = json_encode(array_values($shifts));
            $update_shift->save();

            return redirect('admin/opds');

    } 


    protected function opd_validation($days , $shifts, $data){

        foreach ($data as $day_key => $day_value) {


            if(in_array($day_key, $days)){
                foreach ($day_value as $shift_key => $shift_value) {
                    if(in_array($shift_key, $shifts[$day_key])){
                        if(empty($shift_value['start_hour']) || empty($shift_value['start_min']) || empty($shift_value['end_hour'])  || empty($shift_value['end_min'])  || empty($shift_value['average_patient'])  || empty($shift_value['per_patient_time']) ) {
                            return;
                            }
                    }else{
                        continue;
                    }
                }
            }else{
                continue;
            }
        }
        return true;
 }


    public function save(Request $request){

       // dd( User::find($request->dr_id)->dr_id); 


        $request->validate([
            // 'name' => 'required|max:255',
            'dr_id' => 'required',
        ],['dr_id.required'=>"The Doctor field is required"]);


          $request['doc_id'] = User::find($request->dr_id)->dr_id; 

        if(empty($request['day']) || empty($request['day_shift']) ){
            return back()->withInput($request->only('name','dr_id'))->with('new_error','Fill up the opd Schedule form');
        }
        $data = $request->all();
        if(empty($this->opd_validation($request['day'] , $request['day_shift'], $data ))) {
            return back()->withInput($request->only('name','dr_id'))->with('new_error','Fill up the opd schedule correct ');
        }
        $shifts =null;
        unset($data['day'] , $data['day_shift'] );
        if(!empty($data['opd_id'])) {
            $opd = Opd::find($data['opd_id']);
         }else{
            $opd = Opd::firstOrNew(['name'=>$request['name'], 'dr_id'=>$request['dr_id']]);
         }

        $opd->fill($request->all());
        $opd->save();
        $opd_id = $opd->id;
        foreach ($data as $daykey => $day_value) {
            if(is_array($day_value)){
            foreach ($day_value as $shift_key => $shift_value) {
                if(!empty($new_data = array_filter($shift_value))){
                    if(!in_array($daykey, $request['day'])){
                        continue;
                    }else{
                        if(!in_array($shift_key, $request['day_shift'][$daykey])){
                            continue;
                        }
                    }
                    // if(empty($new_data['start_hour']) || empty($new_data['start_min']) || empty($new_data['end_hour'])  || empty($new_data['end_min'])  || empty($new_data['average_patient'])  || empty($new_data['per_patient_time']) ) {
                    //     dd('herw');
                    //    return Redirect::back()->withErrors('new_error','Fill up the opd schedule correct ');
                    //     break;
                    // }
                        

                $opd_detail = OpdDetail::firstOrNew(['opd_id'=>$opd_id, 'day'=>$daykey,'shift_id'=>$shift_key]);
                $opd_detail->opd_id = $opd_id;
                $opd_detail->day = $daykey;
                $opd_detail->shift_id = $shift_key;
                $opd_detail->start_time = $new_data['start_hour'].':'.$new_data['start_min'];
                $opd_detail->end_time = $new_data['end_hour'].':'.$new_data['end_min'];
                $opd_detail->average_patient = $new_data['average_patient'];
                $opd_detail->per_patient_time = $new_data['per_patient_time'];
                $opd_detail->save();
                $shifts[$shift_key] = $shift_key;
                }
                    }
            
            }}
        
        if($shifts){
            $update_shift = Opd::find($opd_id);
            $update_shift->shifts = json_encode(array_values($shifts));
            $update_shift->save();
        }
    	
    	return redirect('admin/opds');
    }


    public function delete($id){

        $opd = opd::find($id);

        if($opd->status==0){

            $opd->update(['status'=>1]);
        }else{

            $opd->update(['status'=>0]);
        }

       
    	return redirect('admin/opds');
    }


    public function edit($id){
        $opd = Opd::find($id);
        $already_have_opd = Opd::whereNotIn('dr_id', [$opd->dr_id] )->pluck('dr_id');
        $doctor = User::where(['type'=>'dr', 'status'=>1 ])->whereNotIn('id',$already_have_opd)->pluck('name','id');
        $shift = Shift::where('status',1)->pluck('name','id');
        return view('organization::opd.edit',compact('opd', 'doctor', 'shift','id' ) );
    } 

    
}
