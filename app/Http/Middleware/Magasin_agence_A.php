<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class Magasin_agence_A
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
        if (Auth::user()->usertype == 'Magasin_agence_A') {
            return $next($request);
        }else{
            return redirect('/')->with('Sorry but you are Not Admin of United Construction');
        }
    }
}
