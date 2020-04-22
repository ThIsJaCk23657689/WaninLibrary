<?php

namespace App\Http\Middleware;

use Tymon\JWTAuth\Token;
use Closure;
use JWTAuth;

class RedirectIfNotAuth
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
        // 從cookie取得token
        $bearer_token = $request->cookie('authorization');
        $rawtoken = trim(strstr($bearer_token, ' '));
        $token = new Token($rawtoken);
        // 解析token
        $payload = JWTAuth::decode($token);
        
        if(!is_null($payload)){
            // 驗證成功
            $request->headers->set('authorization', 'Bearer ' . $token);
            return $next($request);
        }
        return route('login');
    }
}
