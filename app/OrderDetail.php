<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $fillable=[
        'order_id',
        'product_id',
        'quantily',
        'price',
        'name_product',
        'image',
        'preview',
        'address',
    ];
    
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
}
