<?php

namespace App\Model\Organization;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Appointment extends Model
{

	protected $appends = array('readable');

	public $table  = "org_appointments";

	
	protected $fillable = ['type','org_id','opd_id','patient_id', 'date','shift_id','time','token_no','permanent_token','status'];

	public function opd(){
		return $this->belongsTo('App\Model\Organization\Opd'::class);
	}

	public function patients()
	{
		return $this->belongsTo('App\User', 'patient_id','id');
	}

	public function shift(){

		 return $this->belongsTo('App\Model\Organization\Shift'::class);
	}

	public function getReadableAttribute(){

		 return date("g:i a", strtotime($this->time));
			 // $new = $this->date.' '.$this->time;
		// return Carbon::now()->diffForHumans(Carbon::parse($new));
	}

	
    
}
