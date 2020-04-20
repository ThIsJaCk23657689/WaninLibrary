<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Doner as DonerEloquent;

class Book extends Model
{
    protected $fillable = [
        'donor_id', 'barcode', 'callnum', 'category', 'status', 'title', 'subtitle',
        'author', 'translator', 'publisher', 'edition', 'cover_image', 'ISBN', 
        'published_date', 'price', 'content', 'count',
    ];

    public function doner(){
        return $this->belongsTo(DonerEloquent::class);
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
}
