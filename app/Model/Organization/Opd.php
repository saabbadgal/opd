<?php

namespace App\Model\Organization;

use Illuminate\Database\Eloquent\Model;
use Session;

class Opd extends Model
{
    public function __construct(){
    	$this->table = "org_opds";
        //$this->table = "org_".Session::get('org_id')."_opds";
    }


    public function opd_detail(){
    	return $this->hasMany('App\Model\Organization\OpdDetail','opd_id','id')->orderBy('day');
    }

    public function opd_detail_shift(){
        return $this->hasMany( 'App\Model\Organization\OpdDetail','opd_id','id')->orderBy('shift_id');
    }

    public function doctor_detail(){
        return $this->belongsTo( 'App\Model\Organization\User','dr_id','id')->where('type','dr');
    }

    public function main_doctor(){
    	return $this->belongsTo('App\Model\Doctor','doc_id','id');
    }

    

    public function appointment(){
        return $this->hasMany(Appointment::class);
    }

    public function org(){

        return $this->belongsTo('App\Model\Organization\Organization','org_id');
    }

    // public static function opd_list(){

    //     return Self::with('doctor_detail')->pluck('name','id');
    // }

    protected $fillable = ['name','org_id', 'dr_id', 'doc_id', 'status', 'description'];
}
