<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SearchTrait, SoftDeletes;

    const DEFAULT_VALUE = 0;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'deleted_at'
    ];

    /**
     * Value of Defauft Category
     */
    const DEFAULT_CATEGORY_FOOD = 1;
    const DEFAULT_CATEGORY_DRINK = 2;

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
