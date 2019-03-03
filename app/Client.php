<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Client extends Model
{
    use Searchable;
    use SoftDeletes;
    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $casts = ['keywords' => 'array', 'competitors' => 'array', 'geo_targeting' => 'array', 'business_hours' => 'array'];
    protected $dates = ['deleted_at', 'created_at', 'updated_at', 'canceled_at'];


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
