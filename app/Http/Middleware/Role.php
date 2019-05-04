<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {   
        if (Auth::user() !== null) {

            if (Auth::user()->status == 'user') {
                return redirect()->route('root');
            }
            
        }else if (Auth::guard('pemilik-kos')->user() !== null) {
            
            if (Auth::guard('pemilik-kos')->user()->status == 'pemilik'){
                return $next($request);
            }

        }else if (!Auth::guard('admin')->user() !== null) {

            // dd('hacker');
            if (Auth::guard('admin')->user()->status == 'admin'){
                return $next($request);
            }

        }

    }
}
