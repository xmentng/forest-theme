<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 *
 * @package App
 * @property string $title
 * @property string $display_name
 * @property string $description
*/
class Role extends Model
{
    protected $fillable = ['title', 'display_name', 'description'];
    
    
}
