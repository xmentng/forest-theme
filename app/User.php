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

    public function isAdmin()
    {
        foreach ($this->roles()->get() as $role)
        {
            if ($role->name == 'admin')
            {
                return true;
            }
        }
    }

    public function isOwner()
    {
        foreach ($this->roles()->get() as $role)
        {
            if ($role->name == 'owner')
            {
                return true;
            }
        }
    }

    public function isPastor()
    {
        foreach ($this->roles()->get() as $role)
        {
            if ($role->name == 'pastor')
            {
                return true;
            }
        }
    }

    public function isLeader()
    {
        foreach ($this->roles()->get() as $role)
        {
            if ($role->name == 'leader')
            {
                return true;
            }
        }
    }

    public function isWorker()
    {
        foreach ($this->roles()->get() as $role)
        {
            if ($role->name == 'worker')
            {
                return true;
            }
        }
    }

    public function isMember()
    {
        foreach ($this->roles()->get() as $role)
        {
            if ($role->name == 'member')
            {
                return true;
            }
        }
    }

    public function getFullName()
        {
            return $this->first_name . ' ' . $this->last_name;
        }

    /**
     * Hash password
     * @param $input
     */
    public function setPasswordAttribute($input)
    {
        if ($input)
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
    }
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setRoleIdAttribute($input)
    {
        $this->attributes['role_id'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setSexAttribute($input)
    {
        $this->attributes['sex'] = $input ? $input : null;
    }

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

     public function hasRole($role)
    {
        return $this->role == $role;
    }


    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

}
