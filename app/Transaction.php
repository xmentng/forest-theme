<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
     protected $fillable = ['type','amount','user_id',
     'church_id', 'cell_id'
     ];

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
