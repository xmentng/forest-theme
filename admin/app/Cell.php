<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Cell
 *
 * @package App
 * @property string $name
 * @property string $user
 * @property string $church
*/
class Cell extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'user_id', 'church_id'];
    

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
        return $this->belongsTo(Role::class, 'church_id');
    }
    
}
