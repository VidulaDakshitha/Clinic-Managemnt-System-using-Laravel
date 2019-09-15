<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

// this middleware will ensure that only the patients can go to the patient client area
class CheckIfPatientLogged
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
        if(Auth::user()->type === 'patient'){
            return $next($request);
        }
        return abort(403, 'Unauthorized action.');
    }
}