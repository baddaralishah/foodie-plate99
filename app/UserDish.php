<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDish extends Model
{
    protected $table='tareekhs';

    public function dish()
    {
        return $this->belongsTo('App\Dish');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

//    public function comment()
//    {
//        return $this->belongsToMany('App\Comment');
//    }
}
