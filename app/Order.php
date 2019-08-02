<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class Order extends Model
{
    protected $guarded = [];

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function products(){
        return $this->belongsToMany('App\Product');
    }
}
