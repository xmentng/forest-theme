<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimony extends Model
{
    //
     protected $fillable = ['title','body','user_id','church_id','cell_id'];

     /**
     * Set to null if empty
     * @param $input
     */
    public function setUserIdAttribute($input)
    {
        $this->attributes['user_id'] = $input ? $input : null;
    }


      public function user(){
      	return $this->belongsTo('User');
      }

      public function group(){
      	return $this->belongsTo('Group');
      }

      public function church(){
      	return $this->belongsTo('Church');
      }
}
