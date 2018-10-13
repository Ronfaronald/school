<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class School
 *
 * @package App
 * @property string $school
 * @property string $type
 * @property string $gender
 * @property string $religion
 * @property integer $price
 * @property integer $academic
 * @property integer $sports
 * @property integer $culture
 * @property string $location
 * @property string $province
 * @property string $city
 * @property string $level
 * @property string $district
 * @property string $rural_urban
*/
class School extends Model
{
    use SoftDeletes;

    protected $fillable = ['school', 'type', 'gender', 'religion', 'price', 'academic', 'sports', 'culture', 'province', 'city', 'level', 'district', 'rural_urban', 'location_address', 'location_latitude', 'location_longitude'];
    protected $hidden = [];
    
    

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setPriceAttribute($input)
    {
        $this->attributes['price'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setAcademicAttribute($input)
    {
        $this->attributes['academic'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setSportsAttribute($input)
    {
        $this->attributes['sports'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setCultureAttribute($input)
    {
        $this->attributes['culture'] = $input ? $input : null;
    }
    
}
