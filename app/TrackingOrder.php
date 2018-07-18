<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrackingOrder extends Model
{
    protected $fillable = [
        'user_id',
        'old_status',
        'new_status',
        'date_changed'
    ];

    /**
     * Shipping Belong To Orders
     *
     * @return mixed
     */
    public function order()
    {
        return $this->belongsTo('App\User');
    }
}
