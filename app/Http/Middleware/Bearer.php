<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Bearer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //token from env file
        $token = env('API_BEARER_TOKEN');

        //dd($token, $request->header('Authorization'));

        if ($request->header('Authorization') !== "Bearer $token") {
            return response()->json([
                'status' => false,
                'message' => 'Unauthorized'
            ], 401);
        }

        return $next($request);
    }
}
