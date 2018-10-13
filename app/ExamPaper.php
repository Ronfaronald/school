<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ExamPaper
 *
 * @package App
 * @property string $title
 * @property string $catergory
 * @property string $date
 * @property string $file
*/
class ExamPaper extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'catergory', 'date', 'file'];
    protected $hidden = [];
    
    

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setDateAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['date'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
        } else {
            $this->attributes['date'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getDateAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format'));

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d', $input)->format(config('app.date_format'));
        } else {
            return '';
        }
    }
    
}
