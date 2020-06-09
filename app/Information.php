<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use URL;

class Information extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'email', 'tel', 'fax','address','open_at','close_at', 'recommendation_title', 'cover_image'
    ];

    public function showCoverImage(){
        if(empty($this->cover_image)){
            return URL::asset('images/informations/cover_images/default.jpg');
        }else{
            return URL::asset($this->cover_image);
        }
    }
}
