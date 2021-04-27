<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];


    public function tag(){
        return $this->belongsToMany('App\Models\Tag','product_tag','product_id','tag_id');
    }

    public  function color(){
        return $this->belongsToMany('App\Models\Color','color_product','product_id','color_id');
    }


    public function review(){
        return $this->hasMany('App\Models\Review','product_id','id');
    }

    public function category(){
        return $this->belongsTo('App\Models\Category','category_id','id');
    }


    public function subCategory(){
        return $this->belongsTo('App\Models\SubCategory','sub_category_id','id');
    }


    public function brand(){
        return $this->belongsTo('App\Models\BradCategory','brand_id','id');
    }






























}
