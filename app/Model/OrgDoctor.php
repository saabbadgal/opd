<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrgDoctor extends Model
{

	public function org_detail(){

		return $this->belongsTo('App\Model\Organization\Organization','org_id');
	}

	public function doc(){

		return $this->belongsTo('App\Model\Doctor','dr_id');
	}
    
}
