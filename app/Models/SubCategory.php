<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable = ['id','name','category_id'];

    public function category(){
        return $this->belongsTo('App\Models\Category','category_id','id');
    }

    public function product (){
        return $this->hasMany('App\Models\Product','sub_category_id','id');
    }
}
