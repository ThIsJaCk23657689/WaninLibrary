<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Book as BookEloquent;

class Donor extends Model
{
    protected $fillable = [
        'name', 'birthday', 'email', 'tel', 'cellphone',
        'address_zipcode', 'address_county', 'address_district', 'address_others', 'content', 'exposure', 
    ];

    public function books(){
        return $this->hasMany(BookEloquent::class);
    }
}
