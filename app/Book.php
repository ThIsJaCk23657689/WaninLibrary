<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Doner as DonerEloquent;

class Book extends Model
{
    protected $fillable = [
        'donor_id', 'barcode', 'callnum', 'category', 'status', 'title', 'subtitle',
        'author', 'translator', 'publisher', 'edition', 'cover_image', 'ISBN', 
        'published_date', 'price', 'content', 'count',
    ];
    public function doner(){
        return $this->belongsTo(DonerEloquent::class);
    }

}
