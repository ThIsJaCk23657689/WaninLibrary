<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User as UserEloquent;
use DateTimeInterface;
use Carbon\Carbon;

class LoginLog extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id', 'logout_date','content'
    ];

    protected $dates = ['deleted_at'];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format($this->dateFormat ?: 'Y-m-d H:i:s');
    }

    public function user(){
        return $this->belongsTo(UserEloquent::class);
    }

    // scope
    public function scopeOfRange($query, $type, $start_date, $end_date){
        $start = Carbon::createFromFormat('Y-m-d', $start_date)->toDateTimeString();
        $end = Carbon::createFromFormat('Y-m-d', $end_date)->toDateTimeString();

        if($type == 1){
            $query->whereBetween('created_at', [$start, $end]);
        }else{
            $query->whereBetween('logout_date', [$start, $end]);
        }
    }

    public function scopeOfDate($query, $type, $date){
        if($type == 1){
            $query->whereDate('created_at', $date);
        }else{
            $query->whereDate('logout_date', $date);
        }
    }

    public function scopeOfMonth($query, $type, $month){
        if($type == 1){
            $query->whereMonth('created_at', $month);
        }else{
            $query->whereMonth('logout_date', $month);
        }
    }

    public function scopeOfYear($query, $type, $year){
        if($type == 1){
            $query->whereYear('created_at', $year);
        }else{
            $query->whereYear('logout_date', $year);
        }
    }

    public function scopeSortByDate_ASC($query, $type){
        if($type == 1){
            $query->orderBy('created_at', 'asc');
        }else{
            $query->orderBy('logout_date', 'asc');
        }
    }

    public function scopeSortByDate_DESC($query, $type){
        if($type == 1){
            $query->orderBy('created_at', 'desc');
        }else{
            $query->orderBy('logout_date', 'desc');
        }
    }

    public function scopeSortByUserId_ASC($query){
        $query->orderBy('user_id', 'asc');
    }

}
