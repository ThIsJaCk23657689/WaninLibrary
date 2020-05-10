<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Agency as AgencyEloquent;
use App\Borrow as BorrowEloquent;
use App\BorrowLog as BorrowLogEloquent;
use DateTimeInterface;

class Borrower extends Model
{
    protected $fillable = [
        'agency_id', 'name', 'birthday', 'email', 'tel', 'job_title', 'status',
        'activated', 'address_zipcode', 'address_county', 'address_district', 'address_others', 'content', 'count',
    ];

    protected $dates = ['birthday'];

    protected $casts = [
        'birthday' => 'datetime:Y-m-d',
    ];

    // Laravel 7 只要是回傳 json 格式，時間資料就會自動被轉換成 UTC 時間(ISO 8601)，
    // 如果要修改此模型的時間格式，就要覆寫 serializeDate 方法。
    // DateTimeInterface 是原生PHP提供的，直接 use 即可。
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format($this->dateFormat ?: 'Y-m-d H:i:s');
    }

    // ========== 資料庫關聯 ==========
    public function agency()
    {
        return $this->belongsTo(AgencyEloquent::class);
    }

    public function borrows()
    {
        return $this->hasMany(BorrowEloquent::class);
    }

    public function borrowLogs()
    {
        return $this->hasMany(BorrowLogEloquent::class);
    }

    // ========== 顯示資料 ==========
    public function showAgencyName()
    {
        return is_null($this->agency) ? '無' : $this->agency->name;
    }

    //0.一般民眾 1.符合社福資格
    public function showStatus()
    {
        switch ($this->status) {
            case 0:
                $result = '一般民眾';
                break;
            case 1:
                $result = '符合社福資格';
                break;
        }
        return $result;
    }

    public function showAddress()
    {
        $address = $this->address_zipcode . $this->address_county . $this->address_district . $this->address_others;
        return ($address == "" || $address == null) ? '無' : $address;
    }

    //0.停權 1.未停權
    public function showActivated()
    {
        switch ($this->status) {
            case 0:
                $result = '停權';
                break;
            case 1:
                $result = '未停權';
                break;
        }
        return $result;
    }
}
