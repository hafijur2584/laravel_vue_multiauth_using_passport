<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Config;

class CustomAdminProvider
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
        $params = $request->all();
        
        if(array_key_exists('provider', $params)){
            if($params['provider'] == 'admins'){
                $model =  'App\Admin';
            }else{
                $model = 'App\User';
            }
            Config::set('auth.providers.users.model', $model);

        }
        return $next($request);
        
    }
}
