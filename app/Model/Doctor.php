<?php

namespace App\Model;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Session;

class Doctor extends Authenticatable
{

	protected $guard = 'dr';

    protected $fillable = ['secret_id', 'title','profile_pic', 'name', 'email', 'username', 'password', 'gender', 'dob', 'available_in_city', 'phone', 'address', 'specialist', 'education', 'services', 'start_experience', 'description', 'locality', 'country', 'state', 'city', 'status'];

    public function dr_org(){
    	return $this->hasMany('App\Model\OrgDoctor','dr_id');//->where('status',1);
    }
//new 
    public function doctor_org(){

    	return $this->belongsToMany('App\Model\Organization\Organization','org_doctors', 'dr_id', 'org_id' );
    }


	public function doctor_opd(){

    	return $this->hasMany('App\Model\Organization\Opd', 'doc_id');
    }

    public function org_doctor_opd(){

        return $this->hasOne('App\Model\Organization\Opd', 'doc_id')->where('org_id', Session::get('org_id'));
    }



    public function doctor_opd_detail(){

        return $this->hasMany('App\Model\Organization\OpdDetail','opd_id');
    }
 
    
}
