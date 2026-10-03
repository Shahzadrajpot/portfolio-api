<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Cors
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->getMethod() === 'OPTIONS') {
            return response('', 200, [
                'Access-Control-Allow-Origin' => '*',
                'Access-Control-Allow-Methods' => 'GET,POST,PUT,DELETE,OPTIONS',
                'Access-Control-Allow-Headers' => 'Content-Type,Authorization,X-Requested-With',
            ]);
        }

        $response = $next($request);

        foreach (
            [
                'Access-Control-Allow-Origin' => '*',
                'Access-Control-Allow-Methods' => 'GET,POST,PUT,DELETE,OPTIONS',
                'Access-Control-Allow-Headers' => 'Content-Type,Authorization,X-Requested-With',
            ] as $k => $v
        ) {
            $response->headers->set($k, $v);
        }

        return $response;
    }
}
