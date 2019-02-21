<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $fillable = ['name','description','up_cat'];

    function getProducts(){
        return $this->belongsToMany('App\Products');
    }
}
