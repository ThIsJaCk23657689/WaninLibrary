<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User as UserEloquent;

class Activity extends Model
{
    protected $fillable = [
        'last_update_user_id', 'title', 'content', 'cover_image', 'is_top',
    ];

    public function User(){
        return $this->belongsTo(UserEloquent::class);
    }
}
