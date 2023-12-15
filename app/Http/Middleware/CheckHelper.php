<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckHelper
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the connected employee is a helper.
        if (auth()->check() && !auth()->user()->isTechnician()) {
            return $next($request);
        }

        // Return an HTTP 403 Forbidden response.
        abort(403, 'Access denied.');
    }
}