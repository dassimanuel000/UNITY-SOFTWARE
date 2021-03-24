<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class Chef_agence_B
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
        if (Auth::user()->usertype == 'Chef_agence_B') {
            return $next($request);
        }else{
            return redirect('/')->with('Sorry but you are Not Admin of United Construction');
        }
    }
}
