<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use URL;
use Carbon\Carbon;
use DateTimeInterface;

class Information extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'email', 'tel', 'fax','address','open_at','close_at', 'recommendation_title', 'cover_image', 'donate_image'
    ];

    protected $casts = [
        'open_at' => 'datetime:H:i',
        'close_at' => 'datetime:H:i',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format($this->dateFormat ?: 'H:i');
    }

    public function showOpenAt()
    {
        return $this->open_at->isoFormat('H:mm');
    }

    public function showCloseAt()
    {
        return $this->close_at->isoFormat('H:mm');
    }

    public function showCoverImage(){
        if(empty($this->cover_image)){
            return URL::asset('images/informations/cover_images/default.jpg');
        }else{
            return URL::asset($this->cover_image);
        }
    }
    public function showDonateImage(){
        if(empty($this->donate_image)){
            return URL::asset('images/informations/cover_images/default.jpg');
        }else{
            return URL::asset($this->donate_image);
        }
    }
}
