<?php

namespace App\Services;

use App\Donor as DonorEloquent;
use App\Book as BookEloquent;
use Log;

class DonorService extends BaseService
{
    public function add($request)
    {
        $donor = DonorEloquent::create([
            'name' => $request->name,
            'birthday' => $request->birthday,
            'email' => $request->email,
            'tel' => $request->tel,
            'cellphone' => $request->cellphone,

            'address_zipcode' => $request->address_zipcode,
            'address_county' => $request->address_county,
            'address_district' => $request->address_district,
            'address_others' => $request->address_others,
            'content' => $request->content,
            'exposure' => $request->exposure,
        ]);

        $act_user = auth('api')->user();
        Log::info('編號：' . $act_user->id . '，姓名：' . $act_user->name . ' 新增了一筆捐贈人，編號為：' . $donor->id . '。');
        return $donor->id;
    }

    public function count(){
        return DonorEloquent::count();
    }

    public function getList($request)
    {
        if($request->first_page){
            $skip = 0;
        }else{
            $skip = $request->skip ?? 0 ;
        }
        $take = $request->take ?? 10;
        $type = $request->type ?? 0;
        $orderby = $request->orderby ?? 2;
        $exposure = $request->exposure ?? 0;
        $keywords = ($request->keywords != "") ? explode(" ", $request->keywords) : [];

        $type_arr = ['','name', 'tel', 'cellphone', 'email'];

        // 搜尋
        if($keywords == [] && $exposure== 0 && $type== 0 && $orderby == 2){
            // all default
            $donorsModel = new DonorEloquent();
            $count = $donorsModel->count();
            $donors = $donorsModel->orderBy('created_at','desc')->skip($skip)->take($take)->get();

        }else{
            $donorsModel = DonorEloquent::query()->where(function ($query) use ($keywords, $type, $exposure, $type_arr) {

                if($type != 0 && $keywords != []){
                    foreach ($keywords as $keyword) {
                        $keyword = '%'.$keyword.'%';
                        $query->orWhere($type_arr[$type], 'like',$keyword);
                    }
                }elseif($keywords != []){
                    foreach ($keywords as $keyword) {
                        $keyword = '%'.$keyword.'%';
                        for($i = 1; $i<=4; $i++){
                            $query->orWhere($type_arr[$i], 'like',$keyword);
                        }
                    }
                }

            });
            if($exposure != 0){
                $donorsModel->where('exposure', $exposure);
            }
            $count = $donorsModel->count();
            if($orderby == 2){ //DESC
                $donors = $donorsModel->orderBy('created_at','desc')->skip($skip)->take($take)->get();
            }else { //ASC
                $donors = $donorsModel->orderBy('created_at','asc')->skip($skip)->take($take)->get();
            }

        }
        $c = 1;
        foreach($donors as $donor){
            $donor['index'] = $skip + $c;
            $donor['showContact'] = $donor->showContact();
            $donor['showExposure'] = $donor->showExposure();
            $donor['donateAmount'] = $donor->books()->count();
            if($donor->id == 1){
                $donor['action'] =
                '<a href="' . route('donors.show', [$donor->id]) . '" class="btn btn-md btn-info"><i class="fas fa-info-circle"></i></a>
                <a href="' . route('donors.edit', [$donor->id]) . '" class="btn btn-md btn-success"><i class="fas fa-pencil-alt"></i></a>';
            }else{
                $donor['action'] =
                '<a href="' . route('donors.show', [$donor->id]) . '" class="btn btn-md btn-info"><i class="fas fa-info-circle"></i></a>
                <a href="' . route('donors.edit', [$donor->id]) . '" class="btn btn-md btn-success"><i class="fas fa-pencil-alt"></i></a>
                <button type="button" class="btn btn-md btn-danger delete-btn"><i class="far fa-trash-alt"></i></button type="button">
                <span class="d-none">' . route('donors.destroy', [$donor->id]) . '</span>';
            }
            $c ++;
        }
        return [
            'donors' => $donors,
            'count' => $count
        ];
    }

    public function getOne($id)
    {
        $donor = DonorEloquent::findOrFail($id);
        return $donor;
    }

    public function update($request, $id)
    {
        $donor = $this->getOne($id);
        $donor->update([
            'name' => $request->name,
            'birthday' => $request->birthday,
            'email' => $request->email,
            'tel' => $request->tel,
            'cellphone' => $request->cellphone,

            'address_zipcode' => $request->address_zipcode,
            'address_county' => $request->address_county,
            'address_district' => $request->address_district,
            'address_others' => $request->address_others,
            'content' => $request->content,
            'exposure' => $request->exposure,
        ]);

        return $donor->id;
    }

    public function delete($id)
    {
        $donor = $this->getOne($id);
        $books = BookEloquent::where('donor_id', $donor->id)->get();
        foreach($books as $book){
            $book->donor_id = 1;
            $book->save();
        }
        $donor->delete();
    }

    public function getDonorsByName($request){
        if(is_null($request->selectID)){
            $keyword = '%'.$request->keyword."%";
            $donors = DonorEloquent::where('name', 'like', $keyword)->take(30)->get();
        }else{
            if(is_null($request->keyword)){
                $donors = DonorEloquent::where('id', $request->selectID)->take(30)->get();
            }else{
                $keyword = '%'.$request->keyword."%";
                $donors = DonorEloquent::where('name', 'like', $keyword)->take(30)->get();
            }
        }

        return $donors;
    }
}
