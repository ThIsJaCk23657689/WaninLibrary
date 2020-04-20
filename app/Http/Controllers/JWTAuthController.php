<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\ForgetPasswordRequest;
use App\Http\Requests\ResetPasswordRequest;
use Illuminate\Http\Request;
use App\Services\JWTAuthService;
use App\Services\LoginLogService;
use JWTAuth;

class JWTAuthController extends Controller
{
    public $JWTAuthService;
    public $LoginLogService;

    public function __construct(){
        $this->middleware('auth.jwt')->only('logout');
        $this->JWTAuthService = new JWTAuthService();
        $this->LoginLogService = new LoginLogService();
    }

    public function register(AuthRequest $request){
        $user = $this->JWTAuthService->register($request);
        return response()->json($user, 200);
        // return response()->json('5555', 200);
    }

    public function login(LoginRequest $request){

        $msg = $this->JWTAuthService->login($request);
        if($msg == 'invalid_credentials'){
            return response()->json(['error' => $msg], 401);
        }elseif($msg == 'could_not_create_token'){
            return response()->json(['error' => $msg], 500);
        }else{
            return response()->json($msg, 200);
        }

    }

    public function logout(){
        $token = JWTAuth::getToken();
        if ($token) {
            JWTAuth::invalidate($token);
            //紀錄登出資訊
            $this->LoginLogService->update();
            return response()->json(['已登出'], 200);
        } else {
            return response()->json(['已登出'], 200);
        }
    }


    public function refreshToken(){
       $newToken = JWTAuth::parseToken()->refresh();
       return	response()->json(['token' => $newToken]);
    }

    public function forgetPassword(ForgetPasswordRequest $request){

        $msg = $this->JWTAuthService->forgetPassword($request->email);
        return response()->json(['msg'=>$msg], 200);

    }

    public function resetPassword(ResetPasswordRequest $request){

        $msg = $this->JWTAuthService->resetPassword($request->new_password);
        return response()->json(['msg' => $msg], 200);
    }


}
