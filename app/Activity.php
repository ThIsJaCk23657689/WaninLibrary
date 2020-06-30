<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User as UserEloquent;
use URL;
use Carbon\Carbon;

class Activity extends Model
{
    protected $fillable = [
        'last_update_user_id', 'title', 'content', 'cover_image', 'is_top', 'type'
    ];

    public function User(){
        return $this->belongsTo(UserEloquent::class, 'last_update_user_id');
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

    public function showType()
    {
        switch ($this->type) {
            case 1:
                $result = '近期活動';
                break;
            case 2:
                $result = '主題書單';
                break;
            default:
                $result = '不明類型';
        }

        return $this->type;
    }

    public function showTitle(){
        $maxString = 35;
        if(strlen($this->title) >= $maxString*2 ){
            return mb_substr($this->title, 0, $maxString) . '...';
        }else{
            return $this->title;
        }
    }

    public function showCoverImage(){
        if(empty($this->cover_image)){
            return URL::asset('images/activities/cover_images/default.jpg');
        }else{
            return URL::asset($this->cover_image);
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
