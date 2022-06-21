<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BibekMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
        return response(view('underconst'));
        echo "hello i am called";
        // return $next($request);
        return $response;
    }
}
