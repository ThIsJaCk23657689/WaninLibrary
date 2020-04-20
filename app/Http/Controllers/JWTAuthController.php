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
use Validator;

class JWTAuthController extends Controller
{
    public $JWTAuthService;
    public $LoginLogService;

    public function __construct(){
        $this->middleware('auth.jwt')->only([
            'me', 'logout'
        ]);

        $this->middleware('guest:api')->only([
            'register', 'login', 'forgetPassword'
        ]);

        $this->JWTAuthService = new JWTAuthService();
        $this->LoginLogService = new LoginLogService();
    }

    public function register(Request $request){
        // 驗證資料
        $validator = Validator::make($request->all(), $this->generateRules($request));
        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }
        $user = $this->JWTAuthService->register($request);

        // 登入
        $msg = $this->JWTAuthService->login($request);

        return response()->json($msg, 200)->cookie('authorization', $msg['cookie'], 200);
    }

    protected function generateRules(Request $request){
        return [
            'name' => 'required|string|max:100',
            'account' => 'required|string|max:20|min:6|unique:users,account',
            'password' => 'required|string|max:20|min:6|confirmed',
            'status' => 'required|integer|max:1',
            'tel' => 'nullable|string|max:30',
            'email' => 'required|email|max:255|unique:users,email',
            'address_zipcode' => 'nullable|string|max:5',
            'address_county' => 'nullable|string|max:10',
            'address_district' => 'nullable|string|max:10',
            'address_others' => 'nullable|string|max:255',
            'check_code' => 'nullable|string|max:255',
            'content' => 'nullable|string|max:255',
        ];
    }

    public function login(Request $request){
        // 驗證資料
        $validator = Validator::make($request->all(), [
            'account' => 'required|string|max:20|min:6|exists:users',
            'password' => 'required|string|max:20|min:6'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }

        $msg = $this->JWTAuthService->login($request);
        if($msg == 'invalid_credentials'){
            return response()->json(['error' => $msg], 401);
        }elseif($msg == 'could_not_create_token'){
            return response()->json(['error' => $msg], 500);
        }else{
            return response()->json($msg, 200)->cookie('authorization', $msg['cookie'], 200);
        }
    }

    public function me(){
        // return response()->json([
        //     JWTAuth::getToken(),
        //     JWTAuth::getToken()->get(),
        //     JWTAuth::toUser(JWTAuth::getToken()->get()),
        // ]);
        return response()->json(auth('api')->user());
    }

    public function logout(){
        JWTAuth::parseToken()->invalidate();

        //紀錄登出資訊
        $this->LoginLogService->update();

        return response()->json([
            'message' => '已成功登出'
        ]);
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
