<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    protected $table='dishes';

    public function dishesSubCategory()
    {
        return $this->belongsTo('App\Subcategory');
    }

    public function user()
    {
        return $this->hasMany('App\UserDish');
    }
}
