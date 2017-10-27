<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;
class team
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$guard ='team')
    {
        if(!Auth::guard($guard)->check()){
            return redirect()->route('teamSignIn')->with(['status'=>'Access Denied']);
        }
        return $next($request);
    }


}
