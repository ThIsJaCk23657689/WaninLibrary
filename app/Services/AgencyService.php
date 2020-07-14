<?php

namespace App\Services;
use App\Agency as AgencyEloquent;
use Log;

class AgencyService extends BaseService
{
    public function add($request)
    {
        $agency = AgencyEloquent::create([
            'name' => $request->name,
            'tel' => $request->tel,
            'principal' => $request->principal,

            'address_zipcode' => $request->address_zipcode,
            'address_county' => $request->address_county,
            'address_district' => $request->address_district,
            'address_others' => $request->address_others,
            'content' => $request->content,
        ]);

        $act_user = auth('api')->user();
        Log::channel('trace')->info('編號：' . $act_user->id . '，姓名：' . $act_user->name . ' 新增了一筆隸屬單位，編號為：' . $agency->id . '。');

        return $agency->id;
    }

    public function nameIsInique($request)
    {
        $count = AgencyEloquent::where('name', $request->name)->count();
        if($count == 0){
            return ['status' => 200, 'isUnique' => true, 'message'=>'無重複名稱之單位'];
        }else{
            return ['status' => 200, 'isUnique' => false, 'message'=>'已有重複名稱之單位'];
        }
    }

    public function getList()
    {
        $agencies = AgencyEloquent::get();
        return $agencies;
    }

    public function getOne($id)
    {
        $agencies = AgencyEloquent::findOrFail($id);
        return $agencies;
    }

    public function update($request, $id)
    {
        $agency = $this->getOne($id);
        $agency->update([
            'name' => $request->name,
            'tel' => $request->tel,
            'principal' => $request->principal,

            'address_zipcode' => $request->address_zipcode,
            'address_county' => $request->address_county,
            'address_district' => $request->address_district,
            'address_others' => $request->address_others,
            'content' => $request->content,
        ]);

        $act_user = auth('api')->user();
        Log::channel('trace')->info('編號：' . $act_user->id . '，姓名：' . $act_user->name . ' 修改了一筆隸屬單位，編號為：' . $agency->id . '。');

        return $agency->id;
    }

    public function delete($id)
    {
        $agency = $this->getOne($id);
        $agency->delete();

        $act_user = auth('api')->user();
        Log::channel('trace')->info('編號：' . $act_user->id . '，姓名：' . $act_user->name . ' 刪除了一筆隸屬單位，編號為：' . $agency->id . '，名稱為：' . $agency->name . '。');
    }
}
