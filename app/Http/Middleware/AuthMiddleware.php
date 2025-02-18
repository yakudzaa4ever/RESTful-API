<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!$request->header('Authorization')) {
            return response()->json([
                'status' => 401,
                'message' => 'Ruxsat berilmagan. Token talab qilinadi'
            ], 401);
        }

        return $next($request);
    }
}
