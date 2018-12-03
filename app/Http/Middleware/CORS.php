<?php

namespace App\Http\Middleware;

use Closure;


class CORS {

    public function handle($request, Closure $next)
    {

        header('Access-Control-Allow-Origin : *');
        header('Access-Control-Allow-Headers : Content-type, X-Auth-Token, Authorization, Origin');


        return $next($request);
    }
}
