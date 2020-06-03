<?php

namespace App\Services;
use App\Donor as DonorEloquent;


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
        return $donor->id;
    }

    public function count(){
        return DonorEloquent::count();
    }

    public function getList($request)
    {
        $skip = $request->skip ?? 0;
        $take = $request->take ?? 10;
        $type = $request->type ?? 0;
        $exposure = $request->exposure ?? 0;
        $keywords = ($request->keywords != "") ? explode(" ", $request->keywords) : [];

        $type_arr = ['','name', 'tel', 'cellphone', 'email'];

        // 搜尋
        if($keywords == [] && $exposure== 0 && $type== 0){
            // all default
            $donorsModel = new DonorEloquent();
            $count = $donorsModel->count();
            $donors = $donorsModel->skip($skip)->take($take)->get();

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

                if($exposure != 0){
                    $query->where('exposure', $exposure);
                }

            });
            $count = $donorsModel->count();
            $donors = $donorsModel->skip($skip)->take($take)->get();

        }

        foreach($donors as $donor){
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
        $donor->delete();
    }

    public function getDonorsByName($request){
        $keyword = '%'.$request->keyword."%";
        $donors = DonorEloquent::where('name', 'like', $keyword)->take(30)->get();

        return $donors;
    }
}
