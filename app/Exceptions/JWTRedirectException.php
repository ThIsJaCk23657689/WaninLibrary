<?php

namespace App\Exceptions;

use Exception;
use Throwable;
use Log;

class JWTRedirectException extends Exception
{
    public function report()
    {
        Log::debug('Token錯誤，權限不足');
    }

    public function render($request, Throwable $exception)
    {
        // return response()->json([
        //     'msg' => '權限不足'
        // ], 401);

        if ($exception instanceof TokenInvalidException) {
            return response()->json([
                'msg' => 'Token錯誤，權限不足'
            ], 401);
        }

        return parent::render($request, $exception);
    }
}
