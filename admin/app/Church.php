<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Church
 *
 * @package App
 * @property string $name
 * @property string $zone
 * @property string $country
 * @property string $user
*/
class Church extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'zone', 'country', 'user_id'];
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setUserIdAttribute($input)
    {
        $this->attributes['user_id'] = $input ? $input : null;
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
}
