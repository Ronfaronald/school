<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Schoolarship
 *
 * @package App
 * @property string $title
 * @property string $link
 * @property string $email
 * @property text $description
*/
class Schoolarship extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'link', 'email', 'description'];
    protected $hidden = [];
    
    
    
}
