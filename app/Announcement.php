<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User as UserEloquent;

class Announcement extends Model
{
    protected $fillable = [
        'last_update_user_id', 'title', 'content', 'is_top',
    ];

    public function User(){
        return $this->belongsTo(UserEloquent::class);
    }
}
