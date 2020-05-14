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
        return $this->belongsTo('App\User', 'user_id');
    }
}
