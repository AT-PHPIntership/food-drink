<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use SearchTrait;

    protected $search = [
        'name',
    ];

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
