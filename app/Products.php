<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = [
        'name', 'articul', 'brand', 'description', 'price'
    ];

    function getCategories(){
        return $this->belongsToMany('App\Categories');
    }

}
