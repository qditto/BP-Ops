<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $casts = ['keywords' => 'array', 'competitors' => 'array', 'geo_targeting' => 'array', 'business_hours' => 'array'];


    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function client_products()
    {
        return $this->hasMany('App\ClientProduct');
    }

    public function custom_fields()
    {
        return $this->morphToMany('App\CustomField', 'customizable');

    }

    public function logins()
    {
        return $this->hasMany('App\ClientLogin');
    }

    public function team()
    {
        return $this->belongsTo('App\Team');
    }


}
