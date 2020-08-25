<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use Route;
class Module extends Model
{
    protected $fillable = ['name', 'route', 'status', 'parent', 'icon'];

    protected static function route_list(){
    	$routes =  Route::getRoutes();
        // dd((array) $routes );
        foreach($routes as $route)
        {
            if(substr($route->uri ,0,1)=='_'){
            }else{
                $rout =  str_replace('/{id}','',$route->uri);
                $newRoute = str_replace('/{id?}','',$rout);
                $routeList[$route->getName()] = $route->getName();
            }
            
        }
        // dd(array_filter($routeList));

        return $routeList;
    }

    public function self_join(){
        	return $this->hasMany('App\Model\Admin\Module','parent','id');
        }

        
}
