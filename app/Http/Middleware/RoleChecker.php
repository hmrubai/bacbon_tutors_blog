<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleChecker
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // dd($roles);
        if (!in_array($request->user()->role, $roles)) {
            return redirect()->route('public.home')->with('error', 'You are not authorized to access this page.');
        }

        return $next($request);
    }
}
