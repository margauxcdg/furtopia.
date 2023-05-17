<?php


namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;



class isAdopter
{

    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->user_type == 'Adopter') {
            return $next($request);
        }
        return redirect()->route('home')->with('error', 'You do not have permission to access this page.');
    }
}
