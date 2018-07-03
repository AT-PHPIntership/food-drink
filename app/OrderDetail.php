<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $fillable=[
        'order_id',
        'product_id',
        'quantity',
        'price',
        'name_product',
        'image',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['image_url'];
    
    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['image_url'];

    /**
     * Order Belong To OrderDetail
     *
     * @return mixed
     */
    public function order()
    {
        return $this->belongsTo('App\Order', 'order_id', 'id');
    }

    /**
     * Order Belong To Product
     *
     * @return mixed
     */
    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id', 'id');
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
