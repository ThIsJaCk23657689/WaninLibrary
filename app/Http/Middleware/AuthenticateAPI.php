<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Tymon\JWTAuth\Token;
use Cookie;

class AuthenticateAPI extends BaseMiddleware
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
        if (isset($_COOKIE['authorization'])) {
            // 有登入 cookie

            // 從cookie取得token
            $bearer_token = $_COOKIE['authorization'];
            $rawtoken = trim(strstr($bearer_token, ' '));
            $token = new Token($rawtoken);

            $request->headers->set('authorization', 'Bearer ' . $token);

            // 驗證token
            $this->authenticate($request);

            return $next($request);
        }
        throw new UnauthorizedHttpException('jwt-auth', '沒有提供Token');
    }
}
