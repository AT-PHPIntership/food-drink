<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShippingAddress extends Model
{
    use SoftDeletes;
    const ADDRESS = 0;

    protected $fillable = [
        'user_id',
        'address',
        'is_default',
    ];

    /**
     * Shipping Belong To To User
     *
     * @return mixed
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
