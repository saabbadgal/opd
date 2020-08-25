<?php

namespace Modules\Organization\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Session;

class User extends Authenticatable
{
    protected $guard = 'org';
    public function __construct(){
        if(Session::has('org_id')){
          $this->table = 'org_'.Session::get('org_id').'_users';
        }
    }

    use Notifiable;

    public function opd_rel(){
        return $this->hasMany('App\Model\Organization\Opd','dr_id', 'id');
    }

    /**
     * The attributes that are mass assignable.
     * 'address', 'country', 'state', 'city',
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'type', 'role_id',  'phone','dr_id','status'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function doctors(){
        return self::whereType('dr')->pluck('name', 'id');
    }
}
