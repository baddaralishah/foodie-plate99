<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $table='subCats';

    public function Category()
    {
        return $this->belongsTo('App\Category');
    }

    public function dish()
    {
        return $this->hasMany('App\Dish');
    }
}
