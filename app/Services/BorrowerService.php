<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Borrower as BorrowerEloquent;
use Carbon\Carbon;
use Log;

class BorrowerService extends BaseService
{
    public function add($request)
    {
        $borrower = BorrowerEloquent::create([
            'agency_id' => $request->agency_id,

            'name' => $request->name,
            'birthday' => $request->birthday,
            'email' => $request->email,
            'tel' => str_replace('-','',$request->tel),
            'job_title' => $request->job_title,
            'status' => $request->status,
            'activated' => 1,

            'address_zipcode' => $request->address_zipcode,
            'address_county' => $request->address_county,
            'address_district' => $request->address_district,
            'address_others' => $request->address_others,
            'content' => $request->content,
            'count' => $request->count ?? 0,
        ]);

        $act_user = auth('api')->user();
        Log::channel('trace')->info('編號：' . $act_user->id . '，姓名：' . $act_user->name . ' 新增了一筆借閱人，編號為：' . $borrower->id . '。');

        return $borrower->id;
    }

    public function nameIsInique($request)
    {
        $count = BorrowerEloquent::where('name', $request->name)->count();
        if($count == 0){
            return ['status' => 200, 'isUnique' => true, 'message'=>'無重複名稱之借閱人'];
        }else{
            return ['status' => 200, 'isUnique' => false, 'message'=>'已有重複名稱之借閱人'];
        }
    }

    public function count()
    {
        return BorrowerEloquent::count();
    }

    public function getList($request)
    {
        if($request->first_page){
            $skip = 0;
        }else{
            $skip = $request->skip ?? 0 ;
        }
        $take = $request->take ?? 10;
        $status = $request->status ?? 2;
        $activated = $request->activated ?? 2;
        $orderby = $request->orderby ?? 2;
        $type = $request->type ?? 0;
        $keywords = ($request->keywords != "") ? explode(" ", $request->keywords) : [];

         // 0. default 1.'agency_id', 2.'name', 3. 'email', 4. 'tel'
        $type_arr = ['', '', 'name', 'email', 'tel'];

        if($keywords == [] && $status== 2 && $activated == 2 && $type == 0 && $orderby == 2){
            $borrowers_tmp = new BorrowerEloquent();
            $count = $borrowers_tmp->count();
            $borrowers = $borrowers_tmp->orderBy('created_at','desc')->skip($skip)->take($take)->get();
        }else{
            $borrowers_tmp = BorrowerEloquent::query()->where(function ($query) use ($keywords, $type, $type_arr) {

                // type = 2-4
                if($type != 0 && $keywords != [] && $type != 1){
                    foreach ($keywords as $keyword) {
                        $keyword = '%'.$keyword.'%';
                        $query->orWhere($type_arr[$type], 'like', $keyword);
                    }
                // type = 1
                }elseif($type == 1 && $keywords != []){
                    foreach ($keywords as $keyword) {
                        $keyword = '%'.$keyword.'%';
                        $query->orWhere('agency_id','<>', null)->join('agencies', function ($join) use ($keyword) {
                            $join->on('borrowers.agency_id', '=', 'agencies.id')
                                 ->where('agencies.name', 'like', $keyword);
                        });
                    }
                // type = 0; 不分類
                }elseif($keywords != []){
                    foreach ($keywords as $keyword) {
                        $keyword = '%'.$keyword.'%';
                        for($i = 1; $i<=4; $i++){
                            if($i != 1){
                                $query->orWhere($type_arr[$i], 'like', $keyword);
                            }else{
                                $query->orWhere('agency_id','<>', null)->join('agencies', function ($join) use ($keyword) {
                                    $join->on('borrowers.agency_id', '=', 'agencies.id')
                                         ->where('agencies.name', 'like', $keyword);
                                });
                            }
                        }
                    }
                }



            });
            if($status != 2){
                $borrowers_tmp->where('status', $status);
            }
            if($activated != 2){
                $borrowers_tmp->where('activated', $activated);
            }
            $count = $borrowers_tmp->count();
            if($orderby == 2){ //DESC
                $borrowers = $borrowers_tmp->orderBy('created_at','desc')->skip($skip)->take($take)->get();
            }else { //ASC
                $borrowers = $borrowers_tmp->orderBy('created_at','asc')->skip($skip)->take($take)->get();
            }


        }

        $act_user = auth('api')->user();
        $c = 1;
        foreach ($borrowers as $borrower) {
            $borrower['index'] = $skip + $c;
            $borrower['showAgencyName'] = $borrower->showAgencyName();
            $borrower['borrowCounts'] = $borrower->borrowCounts();
            $borrower['expiredCounts'] = $borrower->expiredCounts();
            $borrower['action'] =
                '<a href="' . route('borrowers.show', [$borrower->id]) . '" class="btn btn-md btn-info"><i class="fas fa-info-circle"></i></a>
                <a href="' . route('borrowers.edit', [$borrower->id]) . '" class="btn btn-md btn-success"><i class="fas fa-pencil-alt"></i></a>
                <button type="button" class="btn btn-md btn-danger delete-btn"><i class="far fa-trash-alt"></i></button type="button">
                <span class="d-none">' . route('borrowers.destroy', [$borrower->id]) . '</span>';
            if($act_user->status == 0){
                if($borrower->activated){
                    $borrower['action'] .= '<button type="button" class="btn btn-md btn-warning activate-btn"><i class="fa fa-user-slash"></i>停權</button type="button">
                                            <span class="d-none">' . route('borrowers.activate', [$borrower->id]) . '</span>';
                }else{
                    $borrower['action'] .= '<button type="button" class="btn btn-md btn-light unactivate-btn"><i class="fas fa-unlock"></i>解除停權</button type="button">
                                            <span class="d-none">' . route('borrowers.activate', [$borrower->id]) . '</span>';
                }
            }
            $c ++;
        }
        $res = ['borrowers' => $borrowers, 'count' => $count];
        return $res;
    }

    public function getOne($id)
    {
        $borrower = BorrowerEloquent::findOrFail($id);
        return $borrower;
    }

    // $model 必須是字串。
    public function getOneWithRelation($id, $model)
    {
        $borrower = BorrowerEloquent::with($model)->findOrFail($id);
        return $borrower;
    }

    public function update($request, $id)
    {
        $borrower = $this->getOne($id);
        $borrower->update([
            'agency_id' => $request->agency_id,

            'name' => $request->name,
            'birthday' => $request->birthday,
            'email' => $request->email,
            'tel' => str_replace('-','',$request->tel),
            'job_title' => $request->job_title,
            'status' => $request->status,
            'activated' => $request->activated ?? $borrower->activated ,

            'address_zipcode' => $request->address_zipcode,
            'address_county' => $request->address_county,
            'address_district' => $request->address_district,
            'address_others' => $request->address_others,
            'content' => $request->content,
            'count' => $request->count ?? $borrower->count ,
        ]);

        $act_user = auth('api')->user();
        Log::channel('trace')->info('編號：' . $act_user->id . '，姓名：' . $act_user->name . ' 修改了一筆借閱人，編號為：' . $borrower->id . '。');

        return $borrower->id;
    }

    public function delete($id)
    {
        $borrower = $this->getOne($id);
        $borrower->delete();

        $act_user = auth('api')->user();
        Log::channel('trace')->info('編號：' . $act_user->id . '，姓名：' . $act_user->name . ' 刪除了一筆借閱人，編號為：' . $borrower->id . '，名稱為：' . $borrower->name .  '。');
    }

    public function activated($id)
    {
        $borrower = $this->getOne($id);
        // 1.代表未停權 0.停權
        if ($borrower->activated == 1) {
            $borrower->update([
                'activated' => 0,
            ]);

            $act_user = auth('api')->user();
            Log::channel('trace')->info('編號：' . $act_user->id . '，姓名：' . $act_user->name . ' 停權了一筆借閱人，編號為：' . $borrower->id . '。');

            return $borrower->name . "已成功停權";
        } else {
            $borrower->update([
                'activated' => 1,
            ]);

            $act_user = auth('api')->user();
            Log::channel('trace')->info('編號：' . $act_user->id . '，姓名：' . $act_user->name . ' 解除停權一筆借閱人，編號為：' . $borrower->id . '。');

            return $borrower->name . "已成功解除停權";
        }
    }

    public function filter(Request $request)
    {
        $borrowers = new BorrowerEloquent();
        if(!is_null($request->name)){
            $borrowers = $borrowers->where('name', 'like', '%' . $request->name . '%');
        }

        if(!is_null($request->tel)){
            $borrowers = $borrowers->where('tel', 'like', '%' . $request->tel . '%');
        }

        if(!is_null($request->birthday)){
            $borrowers = $borrowers->where('birthday', 'like', '%' . $request->birthday . '%');
        }

        $skip = $request->skip ?? 0;
        $take = $request->take ?? 5;

        $totalCount = $borrowers->count();
        $borrowers = $borrowers->skip($skip)->take($take)->get();

        return [
            'totalCount' => $totalCount,
            'borrowers' => $borrowers
        ];
    }
}
