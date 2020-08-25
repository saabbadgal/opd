<?php

namespace App\Model\Organization;

use Illuminate\Database\Eloquent\Model;
use Session;

class OpdDetail extends Model
{
	protected $fillable = ['opd_id', 'day', 'shift_id', 'start_time', 'end_time', 'average_patient', 'status'];

    public function __construct(){
    	$this->table = "org_opd_details";
        //$this->table = "org_".Session::get('org_id')."_opd_details";
    }
    public function shift() {
    	return $this->belongsTo('Modules\Organization\Entities\Shift','shift_id','id');
    }

    public function opd(){

    	return $this->belongsTo(Opd::class);
    }

    // public function getStartTimeAttribute($value){

    //     return date('h:i', strtotime($value));
    // }

    public function getStartAttribute(){

        return date('H:i', strtotime($this->start_time));
    }

    public function doc_opd(){

        return $this->hasMany('App\Model\Doctor','opd_id');
    }
   

    // public function getEndTimeAttribute($value){ 

    //     return date('h:i', strtotime($value));
    // }

    // public function getReadableAttribute(){

    //      return date("g:i a", strtotime($this->end_time));
    //          // $new = $this->date.' '.$this->time;
    //     // return Carbon::now()->diffForHumans(Carbon::parse($new));
    // }


}
