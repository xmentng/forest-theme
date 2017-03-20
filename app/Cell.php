<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cell extends Model
{
    //
      protected $fillable = ['name','user_id','church_id'];

      public function user(){
      	return $this->belongsTo('User');
      }

      public function church(){
      	return $this->belongsTo('Church');
      }

     public function transactions(){
        return $this->hasMany('Transaction');
    }

    public function testimonies(){
        return $this->hasMany('Testimony');
    }
}
