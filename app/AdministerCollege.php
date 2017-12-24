<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdministerCollege extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'administer_colleges';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'aka', 'county_id'];

    
}
