<?php

namespace App\Model\Organization;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $fillable = ['name', 'type', 'address', 'country', 'state', 'city', 'phone', 'sub_domain', 'email', 'password', 'status'];


    public function organization_dr(){

        return $this->belongsToMany('App\Model\Doctor','org_doctors','org_id','dr_id');
    }

    public function org_opd(){
        
    } 

    public function org_cms(){
        return $this->hasOne('App\Model\Organization\OrgCm','org_id');
    }

    public function org_dr(){
        return $this->hasMany('App\Model\OrgDoctor','org_id');
    }

    public function country_rel(){
    	return $this->belongsTo('App\Model\Country','country');
    }

    public function state_rel(){
    	return $this->belongsTo('App\Model\State','state');
    }

    public function city_rel(){
    	return $this->belongsTo('App\Model\City','city');
    }
}
