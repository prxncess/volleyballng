<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class event
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard='organizer')
    {
        if(!Auth::guard($guard)->check()){
            //redirect a user if access was denied
            return redirect()->route('organizerLogin')->with(['res'=>'Access Denied']);
        }
        return $next($request);
    }
}
