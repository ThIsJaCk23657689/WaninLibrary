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

    public function getList($skip, $take)
    {
        $donorsModel = new DonorEloquent();
        $count = $donorsModel->count();

        // 搜尋

        $donors = $donorsModel->skip($skip)->take($take)->get();

        foreach($donors as $donor){
            $donor['showContact'] = $donor->showContact();
            $donor['showExposure'] = $donor->showExposure();
            $donor['donateAmount'] = $donor->books()->count();
            $donor['action'] = 
                '<a href="' . route('donors.show', [$donor->id]) . '" class="btn btn-md btn-info"><i class="fas fa-info-circle"></i></a>
                <a href="' . route('donors.edit', [$donor->id]) . '" class="btn btn-md btn-success"><i class="fas fa-pencil-alt"></i></a>
                <a href="#" class="btn btn-md btn-danger"><i class="far fa-trash-alt"></i></a>';
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
}