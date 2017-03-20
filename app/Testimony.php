<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimony extends Model
{
    //
     protected $fillable = ['title','body','user_id'];

     protected $table = 'testimony';

      public function user(){
      	return $this->belongsTo('User');
      }

      public function cell(){
      	return $this->belongsTo('Cell');
      }

      public function users(){
      	return $this->belongsTo('Church');
      }
}
