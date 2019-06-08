<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    function children(){
        return $this->hasMany(self::class, 'parent_id');
    }
}
