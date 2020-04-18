<?php

namespace App\Services;
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
            'activated' => $request->activated,
            

            'address_zipcode' => $request->address_zipcode,
            'address_county' => $request->address_county,
            'address_district' => $request->address_district,
            'address_others' => $request->address_others,
            'content' => $request->content,
            'count' => $request->count,
        ]);
        return $borrower->id;
    }

    public function getList()
    {
        $borrowers = BorrowerEloquent::withTrashed()->get();
        return $borrowers;
    }

    public function getOne($id)
    {
        $borrowers = BorrowerEloquent::withTrashed()->findOrFail($id);
        return $borrowers;
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
            'activated' => $request->activated,
            

            'address_zipcode' => $request->address_zipcode,
            'address_county' => $request->address_county,
            'address_district' => $request->address_district,
            'address_others' => $request->address_others,
            'content' => $request->content,
            'count' => $request->count,
        ]);

        return $borrowers->id;
    }

    public function delete($id)
    {
        $borrowers = $this->getOne($id);
        $borrowers->delete();
    }
}