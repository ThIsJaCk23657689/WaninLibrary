<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'email', 'tel', 'fax','address','open_at','close_at', 'recommendation_title', 'cover_image'
    ];
}
