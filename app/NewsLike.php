<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsLike extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'news_likes';

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
    protected $fillable = ['user_id','news_id','usefull','not_usefull'];
}
