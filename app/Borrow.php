<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Book as BookEloquent;
use App\Borrower as BorrowerEloquent;

class Borrow extends Model
{
    protected $fillable = [
        'borrower_id', 'book_id', 'return_date', 'status', 'noticed',
    ];

    public function book(){
        return $this->belongsTo(BookEloquent::class);
    }
    public function borrower(){
        return $this->belongsTo(BorrowerEloquent::class);
    }

}
