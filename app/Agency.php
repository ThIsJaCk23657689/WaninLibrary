<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Borrower as BorrowerEloquent;

class Agency extends Model
{
    protected $fillable = [
        'name', 'tel', 'principal', 'address_zipcode', 'address_county', 'address_district', 'address_others', 
    ];

    public function borrowers(){
        return $this->hasMany(BorrowerEloquent::class);
    }
}
