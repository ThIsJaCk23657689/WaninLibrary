<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User as UserEloquent;
use Carbon\Carbon;

class Announcement extends Model
{
    protected $fillable = [
        'last_update_user_id', 'title', 'content', 'is_top',
    ];

    public function user(){
        return $this->belongsTo(UserEloquent::class,'last_update_user_id');
    }

    // 顯示最後更新人員姓名
    public function showUserName()
    {
        return is_null($this->last_update_user_id) ? '無' : $this->user->name;
    }

    public function showDate()
    {
        return $this->updated_at->isoFormat('YYYY.MM.DD');
    }

    public function showTitle(){
        $maxString = 16;
        if(strlen($this->title) >= $maxString*2 ){
            return mb_substr($this->title, 0, $maxString) . '...';
        }else{
            return $this->title;
        }
    }

    public function showDay(){
        return $this->updated_at->isoFormat('DD');
    }
    public function showYear(){
        return $this->updated_at->isoFormat('YYYY');
    }
    public function showMonth(){
        $date = Carbon::parse($this->updated_at)->format('F');
        return strtoupper($date);
    }
}
