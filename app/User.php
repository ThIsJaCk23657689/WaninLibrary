<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\LoginLog as LoginLogEloquent;
use App\Activity as ActivityEloquent;
use App\Announcement as AnnouncementEloquent;


class User extends Authenticatable implements JWTSubject
{
    use Notifiable;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'account', 'password', 'status', 'tel',
        'email', 'address_zipcode', 'address_county',
        'address_district', 'address_others', 'content'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    protected $dates = ['deleted_at'];

    // /**
    //  * The attributes that should be cast to native types.
    //  *
    //  * @var array
    //  */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function loginLogs(){
        return $this->hasMany(LoginLogEloquent::class);
    }

    public function Activity(){
        return $this->hasMany(ActivityEloquent::class);
    }

    public function Announcement(){
        return $this->hasMany(AnnouncementEloquent::class);
    }

    public function showStatus(){
        return ($this->status)? '一般使用者' : '管理者' ;
    }

    public function showAddress(){
        return ($this->address_zipcode . $this->address_county . $this->address_district . $this->address_others) ?? '無';
    }
}
