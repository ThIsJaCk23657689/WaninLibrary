<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donor extends Model
{
    protected $fillable = [
        'name', 'birthday', 'email', 'tel', 'job_title', 'status', 'cellphone',
        'address_zipcode', 'address_county', 'address_district', 'address_others', 'content', 'exposure', 
    ];
}
