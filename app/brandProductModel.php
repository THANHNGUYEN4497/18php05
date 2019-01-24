<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class brandProductModel extends Model
{
    protected $table = "brand";

    public function connectCategory(){
        return $this->belongsTo('App\categoryModel','id_cate','id');
    }
    public function connectProduct(){
        return $this->hasMany('App\productModel','id_brand','id');
    }
    public function connectSlider(){
        return $this->hasManyThrough('');
    }
}
