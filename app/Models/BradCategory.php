<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BradCategory extends Model
{
    protected $fillable = ['id','name','logo'];




    public function product (){
        return $this->hasOne('App\Models\Product','brand_id','id');
    }
}
