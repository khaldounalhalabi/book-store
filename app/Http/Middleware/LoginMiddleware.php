<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LoginMiddleware
{
    /**
     * @param Request $request
     * @param Closure $next
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->guard('web')->user() && auth()->guard('web')->user()->hasRole('customer')) {
            return $next($request);
        } else {
            return redirect()->route('login-page');
        }


    }
}
