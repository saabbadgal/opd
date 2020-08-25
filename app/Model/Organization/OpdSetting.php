<?php

namespace Modules\Organization\Entities;

use Illuminate\Database\Eloquent\Model;
use Session;

class OpdSetting extends Model
{
    protected $fillable = ['opd_id', 'dates', 'shift_id', 'status'];


    public function __construct(){
    	$this->table = "org_".Session::get('org_id')."_opd_settings";
    }
}
