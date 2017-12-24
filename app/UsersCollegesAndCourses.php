<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersCollegesAndCourses extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'UsersCollegesAndCourses';

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
    protected $fillable = ['user_id','fax_id', 'course_id'];
}
