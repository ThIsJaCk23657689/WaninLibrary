<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Donor as DonorEloquent;
use App\BorrowLog as BorrowLogEloquent;
use URL;

class Book extends Model
{
    protected $fillable = [
        'donor_id', 'barcode', 'callnum', 'category', 'status', 'title', 'subtitle',
        'author', 'translator', 'publisher', 'edition', 'cover_image', 'ISBN',
        'published_date', 'price', 'content', 'count', 'language','position', 'is_recommended'
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
            case config('book.status.LISTED'):
                $result = '在庫';
                break;
            case config('book.status.BORROWED'):
                $result = '借出';
                break;
            case config('book.status.EXPIRED'):
                $result = '逾期';
                break;
            case config('book.status.INSTOCK'):
                $result = '庫藏待上架';
                break;
            case config('book.status.ELIMINATED'):
                $result = '已淘汰';
                break;
            case config('book.status.GIFTED'):
                $result = '已轉贈';
                break;
            case config('book.status.WAITINGFORTAKE'):
                $result = '待索取';
                break;
            case config('book.status.TAKEN'):
                $result = '已被索取';
                break;
            case config('book.status.NOBORROW'):
                $result = '無外借';
                break;
            case config('book.status.NORETURNED'):
                $result = '無歸還';
                break;
            default:
                $result = '未知狀態碼';
                break;
        }
        return $result;
    }

    public function showCoverImage(){
        if(empty($this->cover_image)){
            return URL::asset('images/books/default.png');
        }else{
            if(!preg_match("/^[a-zA-Z]+:\/\//", $this->cover_image)){
                return URL::asset($this->cover_image);
            }else{
                return $this->cover_image;
            }
        }
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
    //1.在庫、2.借出 3.逾期 4.庫藏待上架 5.已淘汰
    //6.已轉贈、7.待索取 8.已被索取、9.無外借、10.無歸還
    public function scopeOfStatus($query, $status){
        $query->where('status', $status);
    }
}
