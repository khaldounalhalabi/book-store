<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DashboardMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user() && (auth()->user()->hasRole('admin') || auth()->user()->hasRole('super-admin'))) {
            return $next($request);
        } else {
            return redirect()->route('admin.login-page');
        }
    }
}