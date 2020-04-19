<?php

namespace App\Services;
use App\Borrower as BorrowerEloquent;

class BorrowerService extends BaseService
{
    public function add($request){
        $borrower = BorrowerEloquent::create([
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
        return $borrower->id;
    }

    public function getList(){
        $borrowers = BorrowerEloquent::get();
        return $borrowers;
    }

    public function getOne($id){
        $borrower = BorrowerEloquent::findOrFail($id);
        return $borrower;
    }

    public function update($request, $id){
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

    public function delete($id){
        $borrowers = $this->getOne($id);
        $borrowers->delete();
    }

    public function activated($request){
        $borrower = $this->getOne($request->id);
        //1.代表未停權 0.停權
        if($borrower->acticated == 1){
            $borrower->update([
                'content' => $request->content,
                'activated' => 0,
            ]);
            return $borrower->name."已被停權";
        }else{
            $borrower->update([
                'content' => $request->content,
                'activated' => 1,
            ]);
            return $borrower->name."已被解除停權";
        }
    }
}