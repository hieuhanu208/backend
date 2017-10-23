<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
     public  function __construct(Auth $auth)
     {
         $this->auth = $auth;
     }

    public function handle($request, Closure $next)
    {
        if(Auth::check()){
    		return redirect('admin/index');
    	}
        return $next($request);
    }

}
