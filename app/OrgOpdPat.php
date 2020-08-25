<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrgOpdPat extends Model
{
    protected $fillable = ['org_pat_id', 'opd_id', 'shift_id'];

    public function org_pat(){
    	return $this->belongsTo('App\OrgPatient','org_pat_id');
    }

    public function pat_appointment(){
    	return $this->hasMany('App\PatientAppointment','org_opd_pat_id');
    }

}
