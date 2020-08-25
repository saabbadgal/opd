<?php

namespace Modules\Organization\Entities;

use Illuminate\Database\Eloquent\Model;
use Session;
class DelayOpdService extends Model
{
    protected $fillable = ['id', 'opd_id', 'date', 'shift_id', 'type', 'delay_time','start_time', 'from', 'to', 'reason'];

    public function __construct(){
    	$this->table = "org_".Session::get('org_id')."_delay_opd_services";
    }
}
