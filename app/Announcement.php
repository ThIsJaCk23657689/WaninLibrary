<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User as UserEloquent;
use DateTimeInterface;

class Announcement extends Model
{
    protected $fillable = [
        'last_update_user_id', 'title', 'content', 'is_top',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format($this->dateFormat ?: 'Y.m.d');
    }

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
        if(mb_strlen($this->title) >= $maxString){
            return mb_substr($this->title, 0, $maxString) . '...';
        }else{
            return $this->title;
        }
    }
}
