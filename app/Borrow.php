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

    protected $casts = [
        'return_date' => 'datetime:Y-m-d',
        'created_at' => 'datetime:Y-m-d',
        'updated_at' => 'datetime:Y-m-d',
    ];

    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format($this->dataFormat? : 'Y-m-d H:i:s');
    }

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
        switch ($this->noticed){
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

    public function scopeBorrowed($query){
        $query->where('status', 1);
    }

    public function scopeExpired($query){
        $query->where('status', 2);
    }

    public function scopeLost($query){
        $query->where('status', 3);
    }

    public function scopeUnNoticed($query, $type = NULL){
        if($type){
            if($type == 2){ //郵件已通知、電話未通知
                $query->where('noticed', 2);
            }else{ // 郵件未通知、電話已通知
                $query->where('noticed', 3);
            }
        }else{ // 郵件電話皆未通知
            $query->where('noticed', 4);
        }

    }

    public function scopeNoticed($query){
        $query->where('noticed', 1);
    }
}
