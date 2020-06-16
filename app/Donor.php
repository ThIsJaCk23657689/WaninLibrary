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

    public function showContact(){
        if(is_null($this->cellphone)){
            if(is_null($this->tel)){
                return '無';
            }else{
                return '(電話) ' . $this->tel;
            }
        }else{
            return '(手機) ' . $this->cellphone;
        }
    }

    public function showExposure(){
        $result = '';
        switch($this->exposure){
            case '2':
                $result = '半公開';
                break;
            case '3':
                $result = '對外匿名';
                break;
            default:
                $result = '完全公開';
                break;
        }
        return $result;
    }

    public function showAddress(){
        return ($this->address_zipcode . $this->address_county . $this->address_district . $this->address_others) ?? '無';
    }

    public function showName(){
        $result = '';
        switch($this->exposure){
            case '2':
                $length = mb_strlen($this->name);
                if($length == 1){
                    $result = '〇';
                }else if($length == 2){
                    $result = mb_substr($this->name, 0, 1) . '〇';
                }else{
                    $result = mb_substr($this->name, 0, 1);
                    for($i = 0; $i < $length-2; $i++){
                        if(mb_substr($this->name, $i+1, 1) != ' '){
                            $result = $result . '〇';
                        }else{
                            $result = $result . ' ';
                        }
                    }
                    $result = $result . mb_substr($this->name, -1);
                }
                break;
            case '3':
                $result = '善心人士';
                break;
            default:
                $result = $this->name;
                break;
        }
        return $result;
    }
}
