<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    protected $fillable = [
        'email', 'tel', 'fax','address','open_at','close_at'
    ];
}
