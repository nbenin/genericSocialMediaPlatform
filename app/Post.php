<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //

    /**
     * This model's default attributes
     *
     * @var array
     */
    protected $attributes = [
        'edited' => false,
    ];


    // Trying to make relations
    public function user()
    {
        $this->belongsTo('App/User');
    }
    public function comment()
    {
        $this->hasMany('App/Comment');
    }
}
