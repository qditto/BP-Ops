<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable =['product_category_id', 'name', 'spend', 'details'];
    public function product_category()
    {
        return $this->belongsTo('App\ProductCategory');
    }

    public function client_product()
    {
        return $this->hasMany('App\ClientProduct');
    }
}
