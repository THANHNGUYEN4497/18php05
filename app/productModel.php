<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productModel extends Model
{
    protected $table= "product";
    public function connectBrand(){
        return $this->belongsTo('App\brandProductModel','id_brand','id');
    }
    public function slider(){
        return $this->hasOne('App\sliderModel');
    }
}
