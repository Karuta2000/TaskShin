<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HostMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the request is coming from the host
        if ($request->getHost() === 'localhost:8000') {
            return $next($request);
        }

        abort(403, 'Unauthorized.'); // Return a 403 Forbidden error if not from the host
    }
}
