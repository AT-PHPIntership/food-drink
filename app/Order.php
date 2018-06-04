<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    const ACCEPTED = 2;
    const PENDING = 1;
    const LATEST_ORDERS = 7;
    
    protected $fillable=[
        'user_id',
        'total',
        'status',
    ];

    /**
     * Order Belong To User
     *
     * @return mixed
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    /**
     * Order Belong To OrderDetail
     *
     * @return mixed
     */
    public function orderDetails()
    {
        return $this->hasMany('App\OrderDetail');
    }
}
