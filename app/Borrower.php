<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Agency as AgencyEloquent;

class Borrower extends Model
{
    protected $fillable = [
        'agency_id', 'name', 'birthday', 'email', 'tel', 'job_title', 'status', 
        'activated', 'address_zipcode', 'address_county', 'address_district', 'address_others', 'content', 'count', 
    ];

    public function agency(){
        return $this->belongsTo(AgencyEloquent::class);
    }
}
