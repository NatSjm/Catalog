<?php


namespace App;
use Illuminate\Database\Eloquent\Model;

class BaseProductable extends Model
{
    protected $guarded = [];
    protected $hidden = ['created_at', 'updated_at', 'id'];

    public function products()
    {
        return $this->morphOne('App\Product', 'productable');
    }
}
