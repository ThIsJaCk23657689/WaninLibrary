<?php

namespace App\Services;

use App\Mail\forgetPassword;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Auth\RedirectsUsers;
use App\Services\LoginLogService;
use App\User as UserEloquent;
use Carbon\Carbon;
use JWTAuth;

class JWTAuthService extends BaseService
{
    use RedirectsUsers;

    public $LoginLogService;

    protected $redirectTo = '/';

    public function __construct(){
        $this->LoginLogService = new LoginLogService();
    }

    public function register($request)
    {
        $user = UserEloquent::create([
            'name' => $request->name,
            'account' => $request->account,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'status' => $request->status,
            'tel' => $request->tel,

            'address_zipcode' => $request->address_zipcode,
            'address_county' => $request->address_county,
            'address_district' => $request->address_district,
            'address_others' => $request->address_others,
            'content' => $request->content,
        ]);

        if($user){
            return $user;
        }else{
            return "failed";
        }
    }

    public function login($request){
        $token = JWTAuth::attempt([
            'account' => $request->account, 
            'password' => $request->password
        ]);

        try{
            if(!$token){
                return 'invalid_credentials'; //401
            }
        } catch(JWTException $e){
            return 'could_not_create_token'; //500
        }
        $cookie_token = 'Bearer ' . $token;

        //紀錄登入資訊
        $this->LoginLogService->add();

        return [
            'token' => $token, 
            'cookie' => $cookie_token,
            'expires_in' => JWTAuth::factory()->getTTL() * 60,
            'redirect_url' => redirect()->intended($this->redirectPath())->getTargetUrl()
        ];
    }

    public function forgetPassword($email){
        $key = $this->randomkeys(15);
        $user = UserEloquent::firstWhere('email', $email);
        $user->password = bcrypt($key);
        $user->save();
        $now = Carbon::now();
        // 寄信
        $destination = collect([
            ['name' => $user->name, 'email' => $email]
        ]);

        // 提供給模板的參數
        $params = [
            'user_name' => $user->name,
            'new_password' => $key,
            'time' => $now,
        ];

        Mail::to($destination)->send(new forgetPassword($params));
        return '請至信箱收信';
    }

    public function resetPassword($new_password){
        // get user by jwt token
        $token = JWTAuth::getToken();
        $user = JWTAuth::toUser($token);

        $user->password = bcrypt($new_password);
        $user->save();

        return '重設密碼成功';
    }

    // 產生隨機碼
    protected function randomkeys($length){
        $key="";
        $pattern = "1234567890abcdefghijklmnopqrstuvwxyz";
        for($i=0;$i<$length;$i++){
            $key .= $pattern{rand(0,35)};
        }
        return $key;
    }

}
