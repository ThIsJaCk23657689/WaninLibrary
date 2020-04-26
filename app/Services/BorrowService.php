<?php

namespace App\Services;
use App\Borrow as BorrowEloquent;
use App\BorrowLog as BorrowLogEloquent;
use App\Borrower as BorrowerEloquent;
use App\Book as BookEloquent;
use Carbon\Carbon;

class BorrowService extends BaseService
{
    // kernel 時間到變逾期；逾期時停權該借閱人；

    // 判斷借閱人是否停權
    public function add($request){

        $borrower = BorrowerEloquent::find($request->borrower_id);
        $book = BookEloquent::where('barcode', $request->barcode)->first();
        if($borrower->activated !=0){
            $borrow = BorrowEloquent::create([
                'borrower_id' => $request->borrower_id,
                'book_id' => $book->id,
                'borrow_date' => Carbon::now(),
                'return_date' => Carbon::now()->addMonth(),
            ]);

            // 增加該書的借閱次數
            $book->count += 1;
            $book->save();

            BorrowLogEloquent::create([
                'borrower_id' => $borrow->borrower_id,
                'borrower_name' => $borrow->book->name,
                'book_id' => $borrow->book_id,
                'book_title' => $borrow->book->title,
                'callnum' => $borrow->book->callnum,
            ]);

            return $borrow->id;
        }else{
            return "該借閱人已遭系統停權，無法進行借閱";
        }

    }

    public function getList(){
        $borrows = BorrowEloquent::get();
        return $borrows;
    }


    public function getBorrowListByStatus($status){
        if($status == 1){
            $borrows = BorrowEloquent::Borrowed()->with('book:id,title,barcode')->with('borrower:id,name')->get();
        }elseif($status == 2){
            $borrows = BorrowEloquent::Expired()->with('book:id,title,barcode')
            ->with('borrower:id,name')->get();
        }else{
            $borrows = BorrowEloquent::Lost()->with('book:id,title,barcode')
            ->with('borrower:id,name')->get();
        }
        return $borrows;
    }

    public function getBorrowListByNoticed($noticed){
        if($noticed == 1){
            $borrows = BorrowEloquent::Noticed()->with('book:id,title,barcode')
            ->with('borrower:id,name')->get();
        }elseif($noticed == 2 || $noticed == 3){
            $borrows = BorrowEloquent::UnNoticed($noticed)->with('book:id,title,barcode')
            ->with('borrower:id,name')->get();
        }else{
            $borrows = BorrowEloquent::UnNoticed()->with('book:id,title,barcode')
            ->with('borrower:id,name')->get();
        }
        return $borrows;
    }

    public function getOne($id){
        $borrow = BorrowEloquent::findOrFail($id);
        return $borrow;
    }

    // 逾期過久無法討回， 將借閱人停權
    public function bookExpired($id){
        $borrow = $this->getOne($id);
        BorrowLogEloquent::create([
            'borrower_id' => $borrow->borrower_id,
            'borrower_name' => $borrow->book->name,
            'book_id' => $borrow->book_id,
            'book_title' => $borrow->book->title,
            'callnum' => $borrow->book->callnum,
            'status' => 3
        ]);
        $borrow->borrower->activated = 0;
        $borrow->borrower->save();
        $borrow->delete();

        return '設定為逾期過久無法討回狀態成功';
    }

    // 條碼還書
    public function returnBookByBarcode($barcode){
        $book_id = BookEloquent::where('barcode', $barcode)->first()->id;
        $borrow = BorrowEloquent::where('book_id', $book_id)->latest()->first();
        BorrowLogEloquent::create([
            'borrower_id' => $borrow->borrower_id,
            'borrower_name' => $borrow->book->name,
            'book_id' => $borrow->book_id,
            'book_title' => $borrow->book->title,
            'callnum' => $borrow->book->callnum,
            'status' => 2
        ]);
        $borrow->delete();
        return '還書成功';
    }

    // 管理者電話通知完畢可點擊已通知按紐
    public function Notified($id){
        $borrow = $this->getOne($id);
        $orig_noticed = $borrow->noticed;
        if($orig_noticed == 4){ //'郵件電話皆未通知'
            $borrow->noticed = 3;
            $borrow->save();
            return '郵件未通知、電話已通知';
        }elseif($orig_noticed == 2){ //'郵件已通知、電話未通知'
            $borrow->noticed = 1;
            $borrow->save();
            return '郵件電話皆已通知';
        }else{
            return "未逾期或已電話通知，不需另行通知";
        }
    }

}
