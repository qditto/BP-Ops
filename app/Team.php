<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public function users()
    {
        return $this->hasMany('App\User');
    }

    public function clients()
    {
        return $this->hasMany('App\Client');
    }
}
