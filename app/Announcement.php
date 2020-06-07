<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User as UserEloquent;

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
}
