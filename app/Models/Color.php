<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $guarded = [];


    public  function product(){
        return $this->belongsToMany('App\Models\Product','color_product','color_id','product_id');
    }





}
