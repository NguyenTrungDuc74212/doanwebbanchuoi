<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Gate;
use Auth;

class AccessPermissionAuth
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
        if (Gate::denies('author')) {
            return redirect()->route('trangchu_admin');
        }
        return $next($request); 


    }
}
