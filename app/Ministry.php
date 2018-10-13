<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Ministry
 *
 * @package App
 * @property string $title
 * @property string $image
 * @property text $body
*/
class Ministry extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'image', 'body'];
    protected $hidden = [];
    
    
    
}
