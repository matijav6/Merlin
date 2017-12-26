<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InstructionLike extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'instructions_likes';

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
    protected $fillable = ['user_id','instructions_id','usefull','not_usefull'];
}
