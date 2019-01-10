<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userModel extends Model
{
    protected $table = 'usersinfo';

    public function user()
    {
        return $this->belongsTo('App\RoleModel', 'is_admin', 'id_user');
    }
}
