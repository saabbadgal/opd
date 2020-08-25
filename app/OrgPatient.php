<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrgPatient extends Model
{
    protected $fillable = ['org_id', 'patient_id', 'status'];

    public function opd(){
    	return $this->hasMany('App\OrgOpdPat','org_pat_id');
    }

    public function patient(){
    	return $this->belongsTo('App\User','patient_id');
    }

    public function org(){
		return $this->belongsTo('App\Model\Organization\Organization','org_id');
    }
}
