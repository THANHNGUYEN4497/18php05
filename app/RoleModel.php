<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class RoleModel extends Model
{
    protected $table = 'checkadmin';
    public function userModel()
    {
        return $this->hasMany('App\userModel', 'is_admin', 'id_admin');
    }
}
