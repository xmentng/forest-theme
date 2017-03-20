<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Church extends Model
{
    //
     public $fillable = ['name','email','zone',
     'country','user_id'
     ];

      public function user(){
      	return $this->belongsTo('User');
      }

      public function transactions(){
        return $this->hasMany('Transaction');
    }

      public function testimonies(){
        return $this->hasMany('Testimony');
    }
}
