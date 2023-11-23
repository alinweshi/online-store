<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
// app/Http/Middleware/CheckRole.php
    public function handle($request, Closure $next, ...$roles)
    {
        if ($request->user() === null) {
            return redirect('/login');
        }

        if ($request->user()->hasAnyRole($roles)) {
            return $next($request);
        }

        return redirect('/online-store'); // Redirect unauthorized access to home or another page
    }

}
