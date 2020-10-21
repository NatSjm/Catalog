<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Filters\ProductFilter;
use Illuminate\Database\Eloquent\Builder;

class Product extends Model
{

    protected $guarded = [];


    public function productable()
    {
        return $this->morphTo();
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function fragrance()
    {
        return $this->belongsTo('App\Fragrance');
    }

    public function scopeFilter ($builder, $filters)
    {
        return $filters->apply($builder);
    }

}
