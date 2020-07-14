<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Book as BookEloquent;
use App\Borrower as BorrowerEloquent;

class BorrowLog extends Model
{
    protected $fillable = [
        'borrower_id', 'borrower_name', 'book_id', 'book_title', 'callnum', 'status'
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

    public function borrower(){
        return $this->belongsTo(BorrowerEloquent::class);
    }

    public function showStatus(){
        switch ($this->status){
            case 1:
                $result = '借閱中';
                break;
            case 2:
                $result = '已歸還';
                break;
            case 3:
                $result = '逾期過久無法討回';
                break;
            case 4:
                $result = '逾期中';
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

    public function showCallNum(){
        $callNum = $this->callnum;
        $category = [
            '000 總類', '100 哲學類', '200 宗教類', '300 科學類', '400 應用科學類', '500 社會科學類',
            '600 史地類', '610 中國史地類', '710 世界史地類', '800 語文文學類', '900 藝術類', '其他'
        ];

        if(strlen($callNum) >= 3){
            if($callNum[0] < 6){
                // 前面6類，可以靠分類號第一碼來判斷。
                return $category[$callNum[0]];
            }else{
                // 第六類到第七類，必須還要再看第二碼。
                if($callNum[0] == 6){
                    if($callNum[1] == 0){
                        return $category[$callNum[0]];
                    }else{
                        return $category[$callNum[0]];
                    }
                }else{
                    if($callNum[0] == 7){
                        if($callNum[1] == 0){
                            return $category[$callNum[0]];
                        }else{
                            return $category[$callNum[0]];
                        }
                    }else{
                        return $category[$callNum[0] + 1];
                    }
                }
            }
        }else{
            return $category[10];
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
