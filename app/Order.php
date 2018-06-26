<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Order extends Model
{
    use Sortable;
    const ACCEPTED = 2, RECEIVED = 5;
    const PENDING = 1;
    const REJECTED = 3;
    const LATEST_ORDERS = 7;

    public $sortable = [
        'id',
        'total',
        'updated_at',
        'created_at'
    ];
    
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
        return $this->belongsTo('App\User')->withTrashed();
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
