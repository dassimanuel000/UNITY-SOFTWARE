<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class Chef_agence_AMiddleware
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
        if (Auth::user()->usertype == 'Chef_agence_A') {
            return $next($request);
        }else{
            return redirect('/')->with('Sorry but you are Not Admin of United Construction');
        }
    }

}
