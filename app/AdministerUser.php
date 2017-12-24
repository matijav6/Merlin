<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdministerUser extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'administer_users';

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
    protected $fillable = ['name', 'email', 'password', 'category'];

    
}
