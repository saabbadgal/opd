<?php

namespace Modules\Organization\Entities;

use Illuminate\Database\Eloquent\Model;
use Session;

class Permisson extends Model
{
   protected $fillable = ['module_id','role_id', 'status', 'type'];
    public function __construct(){
        if(Session::has('org_id')){
          $this->table = 'org_'.Session::get('org_id').'_permissons';
        }
    }
}
