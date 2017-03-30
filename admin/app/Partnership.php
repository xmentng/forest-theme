<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Partnership
 *
 * @package App
 * @property string $type
 * @property decimal $amount
 * @property string $user
 * @property string $church
*/
class Partnership extends Model
{
    use SoftDeletes;

    protected $fillable = ['type', 'amount', 'user_id', 'church_id'];
    

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
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function church()
    {
        return $this->belongsTo(Church::class, 'church_id')->withTrashed();
    }
    
}
