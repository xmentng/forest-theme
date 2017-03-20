<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;


class User extends Authenticatable
{
    use Notifiable;
    use EntrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','sex'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //each user has one church
    public function churches(){
        return $this->hasOne('Church');
    }

    public function cells(){
        return $this->hasOne('Cell');
    }

   
    public function transactions(){
        return $this->hasMany('Transaction');
    }

    public function testimonies(){
        return $this->hasMany('Testimony');
    }
}
