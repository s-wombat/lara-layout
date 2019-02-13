<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    function getProducts(){
        return $this->belongsToMany('App\Product');
    }
}
