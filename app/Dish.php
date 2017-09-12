<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    protected $table='dishes';

    public function subCategory()
    {
        return $this->belongsTo('App\Subcategory');
    }

    public function userDish()
    {
        return $this->hasMany('App\UserDish');
    }
}
