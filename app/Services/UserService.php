<?php

namespace App\Services;
use App\User as UserEloquent;
use Auth;
use JWTAuth;

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
        ]);

        return ['status'=>'OK','added_id'=>$user->id,'url'=>route('users.index')];
    }

    public function getList()
    {
        $users = UserEloquent::withTrashed()->get();
        return $users;
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

        $keyword = '%'.$name.'%';
        $users = UserEloquent::where('name', 'like', $keyword)->get();

        return $users;
    }

    public function update($request, $id)
    {
        $user = $this->getOne($id);
        $user->update([
            'name' => $request->name,
            'account' => $request->account,
            'email' => $request->email,
            'tel' => $request->tel,

            'address_zipcode' => $request->address_zipcode,
            'address_county' => $request->address_county,
            'address_district' => $request->address_district,
            'address_others' => $request->address_others,
        ]);

        return ['status'=>'OK','updated_id'=> $user->id,'url'=>route('users.show',[$user->id])];
    }

    public function delete($id)
    {
        $token = JWTAuth::getToken();
        $act_user = JWTAuth::toUser($token);

        $user = $this->getOne($id);

        // 本人不能刪除, 最高管理者不能刪
        if($act_user->id != $id && $id !=0){
            if($user->trashed()){
                $user->restore();
            }else{
                $user->delete();
            }
        }

        return ['status'=>'OK','url'=>route('users.index')];
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
