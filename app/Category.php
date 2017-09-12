<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table='cats';

    public function subCategory()
    {
        return $this->hasMany('App\Subcategory');
    }
}
