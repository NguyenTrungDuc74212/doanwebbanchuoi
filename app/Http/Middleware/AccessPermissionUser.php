<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Gate;

class AccessPermissionUser
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
        if (Gate::denies('user')) {
            return redirect()->route('trangchu_admin');
        }
        return $next($request); 
    }
}
