<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientAppointment extends Model
{
    protected $fillable = ['org_opd_pat_id', 'appointment_id', 'appointment_date','patient_id'];


    public function appointment_opd(){
    	return $this->belongsTo('App\OrgOpdPat','org_opd_pat_id');
    }
}
