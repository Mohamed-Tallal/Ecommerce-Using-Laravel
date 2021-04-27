<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['id' ,'name_en','name_de'];




    public function subCategory(){
        return $this->hasMany('App\Models\SubCategory','category_id','id');
    }

    public function product (){
        return $this->hasMany('App\Models\Products','category_id','id');
    }
}
