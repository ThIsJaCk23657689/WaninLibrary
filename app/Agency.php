<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Borrower as BorrowerEloquent;

class Agency extends Model
{
    protected $fillable = [
        'name', 'tel', 'principal', 'address_zipcode', 'address_county', 'address_district', 'address_others', 'content'
    ];

    public function borrowers(){
        return $this->hasMany(BorrowerEloquent::class);
    }

    public function showAddress(){
        return ($this->address_zipcode . $this->address_county . $this->address_district . $this->address_others) ?? '無';
    }
}
