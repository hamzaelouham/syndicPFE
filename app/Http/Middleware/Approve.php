<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Approve
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
        if(Auth::check())
        {
            if(!Auth::user()->approve)
            {
                Auth::logout();

                return  redirect()->route('login')->with('message',' plase wait approvel by admin !');
            }
        }

        return $next($request);
    }
}
