<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ASecurity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
    if (auth('ASecurity')->check() && auth('ASecurity')->user()->role === 'security') {
        return $next($request);
    }

    if (!$request->route()) {
        return redirect('/auth/dashboard'); // Redirect to the login page for undefined routes.
    }

    return redirect('/auth/dsahboard'); // Redirect to the login page if not an admin.
    }
}
