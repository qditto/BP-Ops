<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FieldGroup extends Model
{
    public function definitions()
    {
        return $this->hasMany('App\Definition');
    }
}
