<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Testimony
 *
 * @package App
 * @property string $title
 * @property text $body
 * @property string $user
*/
class Testimony extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'body', 'user_id'];
    

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
