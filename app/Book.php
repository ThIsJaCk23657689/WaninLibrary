<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Donor as DonorEloquent;
use App\BorrowLog as BorrowLogEloquent;

class Book extends Model
{
    protected $fillable = [
        'donor_id', 'barcode', 'callnum', 'category', 'status', 'title', 'subtitle',
        'author', 'translator', 'publisher', 'edition', 'cover_image', 'ISBN',
        'published_date', 'price', 'content', 'count', 'language',
    ];

    public function donor(){
        return $this->belongsTo(DonorEloquent::class);
    }

    public function borrowLogs(){
        return $this->hasMany(BorrowLogEloquent::class);
    }

    public function showTitle(){
        $maxString = 80;
        if(strlen($this->title) >= $maxString){
            return mb_substr($this->title, 0, $maxString) . '...';
        }else{
            return $this->title;
        }
    }

    public function showStatus(){
        switch ($this->status) {
            case '1':
                $result = '在庫';
                break;
            case '2':
                $result = '借出';
                break;
            case '3':
                $result = '逾期';
                break;
            case '4':
                $result = '庫藏待上架';
                break;
            case '5':
                $result = '已淘汰';
                break;
            case '6':
                $result = '已轉贈';
                break;
            case '7':
                $result = '待索取';
                break;
            case '8':
                $result = '已被索取';
                break;
            case '9':
                $result = '無外借';
                break;
            case '10':
                $result = '無歸還';
                break;
            default:
                $result = '未知狀態碼';
                break;
        }
        return $result;
    }

    public function scopeNormalCh($query){
        $query->where('category', '<', 10);
    }
    public function scopePaper($query){
        $query->where('category',11);
    }
    public function scopeMagazine($query){
        $query->where('category', 12);
    }
    public function scopeNormalEn($query){
        $query->where('category', 13);
    }
}
