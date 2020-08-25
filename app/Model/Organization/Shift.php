<?php

namespace Modules\Organization\Entities;

use Illuminate\Database\Eloquent\Model;
use Session;

class Shift extends Model
{
    protected $fillable = ['name', 'status'];
    public function __construct(){
    	$this->table = "shifts";
    }

    public function opd_shift(){
    	return $this->hasMany('App\Model\Organization\OpdDetail','shift_id','id');
    }

    public static function shift_data(){
    	return self::whereStatus(1)->pluck('name','id');
    }
}
