<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
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
    public function orderDetail()
    {
        return $this->hasMany('App\OrderDetail');
    }
}
