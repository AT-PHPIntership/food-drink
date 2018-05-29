<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    const ACCEPTED = 2;
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
