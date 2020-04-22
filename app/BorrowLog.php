<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BorrowLog extends Model
{
    protected $fillable = [
        'borrower_id', 'borrower_name', 'book_id', 'book_title', 'callnum',
        'borrow_date', 'returned_date', 'status', 'content'
    ];

    public function showStatus(){
        switch ($this->status){
            case 1:
                $result = '未逾期';
                break;
            case 2:
                $result = '已歸還';
                break;
            case 3:
                $result = '逾期中';
                break;
            case 3:
                $result = '逾期過久無法討回';
                break;
        }
        return $result;
    }
}
