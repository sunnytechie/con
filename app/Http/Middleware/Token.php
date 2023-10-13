<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;

class Token
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
        //user id
        $user_id = $request->user_id;

        //find user
        $user = User::find($user_id);
        //check if user exist
        if(!$user) {
            return response()->json([
                'status' => false,
                'message' => 'User not found'
            ], 404);
        }

        //token user remember_token
        $token = $user->remember_token;

        if ($request->header('Authorization') !== $token) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid token'
            ], 401);
        }

        return $next($request);
    }
}
