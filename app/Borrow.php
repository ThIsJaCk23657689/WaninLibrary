<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Book as BookEloquent;
use App\Borrower as BorrowerEloquent;

class Borrow extends Model
{
    protected $fillable = [
        'borrower_id', 'book_id', 'borrow_date', 'return_date', 'status', 'noticed',
    ];

    public function book(){
        return $this->belongsTo(BookEloquent::class);
    }
    public function borrower(){
        return $this->belongsTo(BorrowerEloquent::class);
    }

    public function showStatus(){
        switch ($this->status){
            case 1:
                $result = '未逾期';
                break;
            case 2:
                $result = '逾期中';
                break;
            case 3:
                $result = '逾期無法討回';
                break;
        }
        return $result;
    }

    public function showNoticed(){
        switch ($this->status){
            case 1:
                $result = '郵件電話皆已通知';
                break;
            case 2:
                $result = '郵件已通知、電話未通知';
                break;
            case 3:
                $result = '郵件未通知、電話已通知';
                break;
            case 4:
                $result = '郵件電話皆未通知';
                break;
        }
        return $result;
    }

}
