<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'parent_id',
    ];
    
    /**
     * Category has Many  products
     *
     * @return mixed
     */
    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
