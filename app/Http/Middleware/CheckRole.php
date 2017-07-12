<?php

namespace DeliveryQuick\Http\Middleware;

use Closure;
use Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if(!Auth::check()){
            return redirect('/login');
        }
        
        if(Auth::user()->role <> $role){
            return redirect('/login');
        }
        
        return $next($request);
    }
}
