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

    protected $casts = [
        'created_at' => 'datetime:Y-m-d'
    ];

    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format($this->dataFormat? : 'Y-m-d H:i:s');
    }

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

    public function scopeOfColumns($query,$keyword = []){
        $arr_cols = ['borrower_id', 'borrower_name', 'book_id', 'book_title', 'callnum'];


        if($keyword!=[]){
            foreach($arr_cols as $col){
                if($col == 'borrower_id'||$col == 'book_id'){
                    $query->orWhere($col, $keyword);
                }else{
                    $query->orWhere($col, 'like', '%'.$keyword.'%');
                }
            }
        }


    }

}
