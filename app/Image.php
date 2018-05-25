<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'image',
        'product_id',
        'deleted_at'
    ];
    
    /**
     * Image Belong To Product
     *
     * @return mixed
     */
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
    
    /**
    * Get the product's image.
    *
    * @return string
    */
    public function getImageUrlAttribute()
    {
        return asset(config('define.images_path_products') . $this->image);
    }
}
