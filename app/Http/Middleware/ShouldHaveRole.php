<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class ShouldHaveRole
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param mixed ...$roles
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (count($roles) > 0) {
            $abort = ($roles[0] == 'candidate' && !auth('candidate')->check()) ||
                     ($roles[0] == 'admin' && !auth()->check());

            abort_if($abort, 404);
        }

        abort_if(!auth()->check() && !auth('candidate')->check(), 404);

        return $next($request);
    }
}
