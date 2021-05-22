<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CustomCKFinderAuth
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
<<<<<<< HEAD
        config(['ckfinder.authentication' => function() {
            return true;
        }]);
=======
        // config(['ckfinder.authentication' => function() {
        //     return true;
        // }]);
>>>>>>> c540d5bb6168e8ab5d1d711e9f433b0d4b02b399
        return $next($request);
    }
}
