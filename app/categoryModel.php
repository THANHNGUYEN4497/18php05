<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class categoryModel extends Model
{
    use Notifiable;
    protected $table= "category";
    protected $fillable = [
        'titleCate','namepro','namebrand'
    ];
    public function connectBrand(){
        return $this->hasMany('App\brandProductModel','id_cate','id');
    }

    public function connectProduct(){
        return $this->hasManyThrough('App\productModel','App\brandProductModel','id_cate','id_brand','id');
    }

}
