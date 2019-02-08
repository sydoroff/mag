<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    function getCategories(){
        return $this->belongsToMany('App\Categories');
    }

}
