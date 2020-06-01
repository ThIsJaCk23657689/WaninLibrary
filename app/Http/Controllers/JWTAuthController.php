<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\ForgetPasswordRequest;
use App\Http\Requests\ResetPasswordRequest;
use Illuminate\Http\Request;
use App\Services\JWTAuthService;
use App\Services\LoginLogService;
use Illuminate\Validation\ValidationException;
use JWTAuth;
use Cookie;

class JWTAuthController extends Controller
{
    public $JWTAuthService;
    public $LoginLogService;

    public function __construct(){
        $this->middleware('auth.jwt')->only([
            'me', 'logout', 'refreshToken','resetPassword','showResetPasswordForm'
        ]);

        $this->middleware('guest:api')->only([
            'register', 'showLoginForm', 'login', 'forgetPassword',
        ]);

        $this->JWTAuthService = new JWTAuthService();
        $this->LoginLogService = new LoginLogService();
    }

    public function register(AuthRequest $request){
        // 註冊
        $user = $this->JWTAuthService->register($request);

        return response()->json($user);

        // // 登入
        // $msg = $this->JWTAuthService->login($request);
        // return response()->json($msg, 200)->cookie('authorization', $msg['cookie'], 200);
    }

    public function showLoginForm(){
        return view('auth.login');
    }

    public function showResetPasswordForm(){
        return view('auth.resetPassword');
    }

    public function login(LoginRequest $request){
        $msg = $this->JWTAuthService->login($request);
        if($msg == 'invalid_credentials'){
            throw ValidationException::withMessages([
                'account' => [trans('auth.failed')],
            ]);
        }elseif($msg == 'could_not_create_token'){
            throw ValidationException::withMessages([
                'account' => '發生錯誤，無法創建token',
            ]);
        }else{
            return response()->json($msg, 200)->cookie('authorization', $msg['cookie'], 1440);
        }
    }

    public function me(){
        // 從header中抓token
        // $bearer_token = $request->cookie('authorization');
        // $rawtoken = trim(strstr($bearer_token, ' '));

        // 從cookie中抓token
        // $rawtoken = JWTAuth::getToken()->get();
        // $token = new Token($rawtoken);
        return response()->json(auth('api')->user());
    }

    public function logout(Request $request){
        JWTAuth::parseToken()->invalidate();

        //紀錄登出資訊
        $this->LoginLogService->update();

        return response()->json([
            'message' => '已成功登出',
            'url' => route('login')
        ])->withCookie(Cookie::forget('authorization'));
    }

    public function refreshToken(){
       $newToken = JWTAuth::parseToken()->refresh();
       return	response()->json([
        'token' => $newToken
       ]);
    }

    public function forgetPassword(ForgetPasswordRequest $request){
        $msg = $this->JWTAuthService->forgetPassword($request->email);
        return response()->json([
            'msg' => $msg
        ], 200);
    }

    public function resetPassword(ResetPasswordRequest $request){
        $msg = $this->JWTAuthService->resetPassword($request->new_password);
        return response()->json([
            'msg' => $msg
        ], 200);
    }
}
