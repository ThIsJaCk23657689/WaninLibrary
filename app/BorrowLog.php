<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Book as BookEloquent;
use App\Borrower as BorrowerEloquent;

class BorrowLog extends Model
{
    protected $fillable = [
        'borrower_id', 'borrower_name', 'book_id', 'book_title', 'callnum',
         'status'
    ];

    public function book(){
        return $this->belongsTo(BookEloquent::class);
    }

    public function borrow(){
        return $this->belongsTo(BorrowerEloquent::class);
    }

    public function showStatus(){
        switch ($this->status){
            case 1:
                $result = '出借';
                break;
            case 2:
                $result = '已歸還';
                break;
            case 3:
                $result = '逾期過久無法討回';
                break;
        }
        return $result;
    }

    public function showTitle(){
        $maxString = 80;
        if(strlen($this->book_title) >= $maxString){
            return mb_substr($this->book_title, 0, $maxString) . '...';
        }else{
            return $this->book_title;
        }
    }

    public function scopeOrderByType($query, $type){
        if($type==1){
            $query->orderBy('created_at', 'DESC');
        }else{
            $query->orderBy('created_at', 'ASC');
        }

    }


    public function scopeOfTime($query, $type, $value, $value2 = NULL){
        switch ($type){
            case 1: // date
                $query->whereDate('created_at', $value);
                break;
            case 2: // month
                $query->whereYear('created_at', $value2)->whereMonth('created_at', $value);
                break;
            case 3: // year
                $query->whereYear('created_at', $value);
                break;
        }
    }

    public function scopeOfColumn($query, $column_name, $value){
        if($column_name == 'borrower_id'||$column_name == 'book_id'||$column_name == 'status'){
            $query->where($column_name, $value);
        }else{
            $query->where($column_name, 'like', '%'.$value.'%');
        }

    }

}
