<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Menbre
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
       
        $homeroute = "welcome";//RouteServiceProvider::HOME;

        $dest = [
          
            1 => 'admin',
            3 => $homeroute,
        ];


        if(!Auth::check())
        {
            return redirect()->route('login');
        }

        if(Auth::user()->role != 2)
        {
             return redirect()->route($dest[Auth::user()->role]);
        }
        
        return $next($request);
    }
}
