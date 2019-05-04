<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Pemilik
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

        if (Auth::guard('pemilik-kos')->user()->status == 'pemilik'){
            return $next($request);
        }
        return $next($request);
        // return redirect('/');
    }
}
