<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Borrower as BorrowerEloquent;

class BorrowerService extends BaseService
{
    public function add($request)
    {
        $borrower = BorrowerEloquent::create([
            'agency_id' => $request->agency_id,

            'name' => $request->name,
            'birthday' => $request->birthday,
            'email' => $request->email,
            'tel' => $request->tel,
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
        return $borrower->id;
    }

    public function count()
    {
        return BorrowerEloquent::count();
    }

    public function getList($request)
    {

        $skip = $request->skip ?? 0;
        $take = $request->take ?? 10;
        $status = $request->status ?? 2;
        $activated = $request->activated ?? 2;
        $type = $request->type ?? 0;
        $keywords = ($request->keywords != "") ? explode(" ", $request->keywords) : [];

         // 0. default 1.'agency_id', 2.'name', 3. 'email', 4. 'tel'
        $type_arr = ['','', 'name', 'email', 'tel'];

        if($keywords == [] && $status== 2 && $activated == 2 && $type == 0){
            $borrowers_tmp = new BorrowerEloquent();
            $count = $borrowers_tmp->count();
            $borrowers = $borrowers_tmp->skip($skip)->take($take)->get();


        }else{
            $borrowers_tmp = BorrowerEloquent::query()->where(function ($query) use ($keywords, $status, $activated, $type, $type_arr) {

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
                        $query->where('agency_id','<>', null)->join('agencies', function ($join) use ($keyword) {
                            $join->on('borrowers.agency_id', '=', 'agencies.id')
                                 ->where('agencies.name', 'like', $keyword);
                        });
                        // $query->join('agencies', 'borrowers.agency_id', '=', 'agencies.id')->orOn('agencies.name', 'like', $keyword);
                    }
                // type = 0; 不分類
                }elseif($keywords != []){
                    foreach ($keywords as $keyword) {
                        $keyword = '%'.$keyword.'%';
                        for($i = 1; $i<=4; $i++){
                            if($i != 1){
                                $query->orWhere($type_arr[$i], 'like', $keyword);
                            }else{
                                $query->where('agency_id','<>', null)->join('agencies', function ($join) use ($keyword) {
                                    $join->on('borrowers.agency_id', '=', 'agencies.id')
                                         ->where('agencies.name', 'like', $keyword);
                                });
                                // $query->join('agencies', 'borrowers.agency_id', '=', 'agencies.id')->orOn('agencies.name', 'like', $keyword);
                            }
                        }
                    }
                }

                if($status != 2){
                    $query->where('status', $status);
                }
                if($activated != 2){
                    $query->where('activated', $activated);
                }

            });
            $count = $borrowers_tmp->count();
            $borrowers = $borrowers_tmp->skip($skip)->take($take)->get();

        }

        foreach ($borrowers as $borrower) {
            $borrower['showAgencyName'] = $borrower->showAgencyName();
            $borrower['borrowCounts'] = 0;
            $borrower['expiredCounts'] = 0;
            $borrower['action'] =
                '<a href="' . route('borrowers.show', [$borrower->id]) . '" class="btn btn-md btn-info"><i class="fas fa-info-circle"></i></a>
                <a href="' . route('borrowers.edit', [$borrower->id]) . '" class="btn btn-md btn-success"><i class="fas fa-pencil-alt"></i></a>
                <a href="#" class="btn btn-md btn-danger"><i class="far fa-trash-alt"></i></a>';
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
        $borrowers = $this->getOne($id);
        $borrowers->update([
            'agency_id' => $request->agency_id,

            'name' => $request->name,
            'birthday' => $request->birthday,
            'email' => $request->email,
            'tel' => $request->tel,
            'job_title' => $request->job_title,
            'status' => $request->status,
            'activated' => $request->activated ?? 0,

            'address_zipcode' => $request->address_zipcode,
            'address_county' => $request->address_county,
            'address_district' => $request->address_district,
            'address_others' => $request->address_others,
            'content' => $request->content,
            'count' => $request->count ?? 0,
        ]);

        return $borrowers->id;
    }

    public function delete($id)
    {
        $borrowers = $this->getOne($id);
        $borrowers->delete();
    }

    public function activated($request)
    {
        $borrower = $this->getOne($request->id);
        // 1.代表未停權 0.停權
        if ($borrower->acticated == 1) {
            $borrower->update([
                'content' => $request->content,
                'activated' => 0,
            ]);
            return $borrower->name . "已被停權";
        } else {
            $borrower->update([
                'content' => $request->content,
                'activated' => 1,
            ]);
            return $borrower->name . "已被解除停權";
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
