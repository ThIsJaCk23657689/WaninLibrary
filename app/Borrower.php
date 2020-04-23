<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Agency as AgencyEloquent;
use App\Borrow as BorrowEloquent;

class Borrower extends Model
{
    protected $fillable = [
        'agency_id', 'name', 'birthday', 'email', 'tel', 'job_title', 'status',
        'activated', 'address_zipcode', 'address_county', 'address_district', 'address_others', 'content', 'count',
    ];

    public function agency(){
        return $this->belongsTo(AgencyEloquent::class);
    }

    public function borrow(){
        return $this->hasMany(BorrowEloquent::class);
    }

    public function showAgencyName(){
        return is_null($this->agency) ? '無' : $this->agency->name ;
    }
}
