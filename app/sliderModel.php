<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sliderModel extends Model
{
    protected $table= 'slider';
    public function connectBrand(){
        return $this->belongsTo('App\brandProductModel','id_brand','id');
    }
}
