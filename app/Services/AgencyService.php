<?php

namespace App\Services;
use App\Agency as AgencyEloquent;


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
        return $agency->id;
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

        return $agency->id;
    }

    public function delete($id)
    {
        $agency = $this->getOne($id);
        $agency->delete();
    }
}