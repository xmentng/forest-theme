<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;


use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
  //use SoftDeletes;
    //
      protected $fillable = ['name','user_id','church_id'];

      public function user(){
      	return $this->belongsTo('User');
      }

      public function church(){
      	return $this->belongsToMany('Church');
      }

     public function transactions(){
        return $this->hasMany('Transaction');
    }

    public function testimonies(){
        return $this->hasMany('Testimony');
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setUserIdAttribute($input)
    {
        $this->attributes['user_id'] = $input ? $input : null;
    }
    /**
     * Set to null if empty
     * @param $input
     */
    public function setChurchIdAttribute($input)
    {
        $this->attributes['church_id'] = $input ? $input : null;
    }
}
