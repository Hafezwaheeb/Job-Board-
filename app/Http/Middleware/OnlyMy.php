<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OnlyMy
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->check()){
            if (auth()->user()->email == 'admin@admin.com') {

                return $next($request);
            }
            return response()->json('You are not allowed to access this route', 403);
        }
        return response()->json('You are not allowed to access this route', 403);
    }
}
