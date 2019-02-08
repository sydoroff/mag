<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    function getProducts(){
        return $this->belongsToMany('App\Products');
    }

    function getUser(){
        return $this->belongsTo('App\User','user_id');
    }
}
