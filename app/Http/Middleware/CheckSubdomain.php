<?php

namespace App\Http\Middleware;

use Closure;

use App\Model\Organization\Organization;
use Session;

class CheckSubdomain
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        // dd(121234354);
        $domain = explode('.', $request->getHost());
        $parameters = $domain[0];

       

        // dump($parameters);

        $data = Organization::select(['id','name'])->where('sub_domain', $parameters);

            if($data->exists()){
      
                $org = $data->first();
                
                Session::put('org_id', $org->id);
                Session::put('org_name', $org->name);
                Session::put('sub_domain',$parameters);
                
            }else{
                dump("this is not registerd org domian");
            }


        return $next($request);
    }
}
