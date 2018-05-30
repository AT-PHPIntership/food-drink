<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use SearchTrait;
    const DEFAULT_VALUE = 0;

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

    /**
     * Sub Category beLongto  Parent Category
     *
     * @return mixed
     */
    public function subCategory()
    {
        return $this->belongsTo(self::class, 'parent_id', 'id');
    }

    /**
     * Parent Category beLongto  Sub Category
     *
     * @return mixed
     */
    public function parentCategories()
    {
        return $this->hasMany(self::class, 'id', 'parent_id');
    }
}
