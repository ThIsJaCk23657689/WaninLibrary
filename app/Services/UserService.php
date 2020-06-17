<?php

namespace App\Services;
use App\User as UserEloquent;
use Auth;
use JWTAuth;
use Log;

class UserService extends BaseService
{
    public function add($request)
    {
        $user = UserEloquent::create([
            'name' => $request->name,
            'account' => $request->gender,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'status' => $request->birthday,
            'tel' => $request->birthday,

            'address_zipcode' => $request->address_zipcode,
            'address_county' => $request->address_county,
            'address_district' => $request->address_district,
            'address_others' => $request->address_others,
            'content' => $request->content,
        ]);

        return [
            'status' => 'OK',
            'added_id' => $user->id,
            'url' => route('users.index')
        ];
    }

    public function getList()
    {
        $users = UserEloquent::get();
        $users_block = UserEloquent::onlyTrashed()->get();
        return [
            'users' => $users, 
            'users_block' => $users_block
        ];
    }

    public function getOne($id)
    {
        $user = UserEloquent::withTrashed()->findOrFail($id);
        return $user;
    }

    public function getUserByToken(){

        $token = JWTAuth::getToken();
        $user = JWTAuth::toUser($token);

        return $user;
    }

    public function getUsersByName($name){

        if($name == ''){
            $users = UserEloquent::withTrashed()->get();
        }else{
            $keyword = '%'.$name.'%';
            $users = UserEloquent::where('name', 'like', $keyword)->get();
        }

        return $users;
    }

    public function update($request, $id)
    {
        $user = $this->getOne($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'tel' => $request->tel,

            'address_zipcode' => $request->address_zipcode,
            'address_county' => $request->address_county,
            'address_district' => $request->address_district,
            'address_others' => $request->address_others,
            'content' => $request->content,
        ]);

        $act_user = auth('api')->user();
        Log::info('編號：' . $act_user->id . '，姓名：' . $act_user->name . ' 後台修改了 編號：' . $user->id . '，姓名：' . $user->name . '。');

        return [
            'status' => 'OK',
            'updated_id' => $user->id,
            'url' => route('users.show', [$id])
        ];
    }

    public function delete($id)
    {
        $act_user = auth('api')->user();

        $user = $this->getOne($id);

        // 本人不能刪除, 最高管理者不能刪
        if($act_user->id != $id && $id !=1){
            if($user->trashed()){
                $user->restore();
                Log::info('編號：' . $act_user->id . '，姓名：' . $act_user->name . ' 解除了 編號：' . $user->id . '，姓名：' . $user->name . ' 的停權限制。');
            }else{
                $user->delete();
                Log::info('編號：' . $act_user->id . '，姓名：' . $act_user->name . ' 停權了 編號：' . $user->id . '，姓名：' . $user->name . '。');
            }
        }

        return ['status'=>'OK','url'=>route('users.index')];
    }

    public function forceDestroy($id)
    {
        $act_user = auth('api')->user();

        $user = $this->getOne($id);

        // 本人不能刪除, 最高管理者不能刪
        if($act_user->id != $id && $id !=1){
            $user->loginLogs()->delete();
            $user->forceDelete();

            Log::info('編號：' . $act_user->id . '，姓名：' . $act_user->name . ' 刪除了 編號：' . $user->id . '，姓名：' . $user->name . '。');
        }

        return [
            'status' => 'OK', 
            'url' => route('users.index')
        ];
    }

    public function getlastupdate()
    {
        $user = UserEloquent::withTrashed()->orderBy('id', 'DESC')->first();
        if(!empty($user)){
            return $user->updated_at;
        }

        return null;
    }
}
