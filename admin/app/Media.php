<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Media
 *
 * @package App
 * @property string $filename
 * @property string $mime
 * @property string $original_filename
*/
class Media extends Model
{
    use SoftDeletes;

    protected $fillable = ['filename', 'mime', 'original_filename'];
    
    
}
