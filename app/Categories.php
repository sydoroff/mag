<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    function getProducts(){
        return $this->belongsToMany('App\Products');
    }
}
