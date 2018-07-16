<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = [
        'user_id',
        'order_id',
        'content',
    ];

    /**
     * Post Belong To User
     *
     * @return mixed
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Post Belong To Order
     *
     * @return mixed
     */
    public function order()
    {
        return $this->belongsTo('App\Order');
    }
}
