<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, $permission = null)
    {
        if (!auth()->check()) {
            return redirect()->route('admin.login');
        }

        // We use a simple role column now instead of Spatie permissions.
        // Admins get access to everything.
        if (auth()->user()->isAdmin()) {
            return $next($request);
        }

        abort(403, 'Unauthorized. Admin access required.');
    }
}
