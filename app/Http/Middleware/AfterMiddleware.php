<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Routing\Middleware;

class AfterMiddleware implements Middleware {

    public function handle($request, Closure $next) {
        $response = $next($request);
        // Do stuff
        return $response;
    }

}