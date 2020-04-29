<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Agency as AgencyEloquent;
use App\Borrow as BorrowEloquent;
use App\BorrowLog as BorrowLogEloquent;

class Borrower extends Model
{
    protected $fillable = [
        'agency_id', 'name', 'birthday', 'email', 'tel', 'job_title', 'status',
        'activated', 'address_zipcode', 'address_county', 'address_district', 'address_others', 'content', 'count',
    ];

    public function agency(){
        return $this->belongsTo(AgencyEloquent::class);
    }

    public function borrows(){
        return $this->hasMany(BorrowEloquent::class);
    }

    public function borrowLogs(){
        return $this->hasMany(BorrowLogEloquent::class);
    }

    public function showAgencyName(){
        return is_null($this->agency) ? '無' : $this->agency->name ;
    }
}
