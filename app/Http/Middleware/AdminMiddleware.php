<?php

namespace App\Http\Middleware;

use JWTAuth;
use Closure;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = null;
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
                return response()->json(['message' => ["permission" => ['Token is Invalid']]], 400);
            }else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
                return response()->json(['message' => ["permission" => ['Token is Expired']]], 400);
            }else{
                return response()->json(['message' => ["permission" => ['Authorization Token not found']]], 400);
            }
        }

        if( !$user->isAdmin() )
        {
            return response()->json(['message' => ["permission" => ["You don't have permission."]]], 400);
        }

        return $next($request);
    }
}
