<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class CheckIfSupplierManagerLogged
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
        // dd($request);
        if(Auth::user()->type === 'supplier_manager'){
            return $next($request);
        }
        return abort(403, 'Unauthorized action.');
    }
}