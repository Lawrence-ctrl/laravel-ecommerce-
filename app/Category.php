<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'id','category_name','category_slug'
    ];

    public function products() {
        return $this->hasMany('App\Product');
    }
}
