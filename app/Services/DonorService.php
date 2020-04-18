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

    public function getList()
    {
        $donors = DonorEloquent::withTrashed()->get();
        return $donors;
    }

    public function getOne($id)
    {
        $donor = DonorEloquent::withTrashed()->findOrFail($id);
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