<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setAmountAttribute($input)
    {
        $this->attributes['amount'] = $input ? $input : null;
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
