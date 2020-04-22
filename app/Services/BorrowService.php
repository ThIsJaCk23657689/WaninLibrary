<?php

namespace App\Services;
use App\Borrow as BorrowEloquent;
use App\BorrowLog as BorrowLogEloquent;

class BorrowService extends BaseService
{
    public function add($request){
        $borrow = BorrowEloquent::create([
            'borrower_id' => $request->borrower_id,
            'book_id' => $request->book_id,
            'return_date' => $request->borrower_id,
            'status' => $request->borrower_id,
            'noticed' => $request->borrower_id,
        ]);
        return $borrow->id;
    }

    public function getList(){
        $borrows = BorrowEloquent::get();
        return $borrows;
    }

    public function getOne($id){
        $borrow = BorrowEloquent::findOrFail($id);
        return $borrow;
    }

    public function update($request, $id){
        $borrows = $this->getOne($id);
        $borrows->update([
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
            'address_oths' => $request->address_oths,
            'content' => $request->content,
            'count' => $request->count ?? 0,
        ]);

        return $borrows->id;
    }

    public function delete($id){
        $borrows = $this->getOne($id);
        $borrows->delete();
    }

}
