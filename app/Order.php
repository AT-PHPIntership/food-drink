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
        'address',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['status_order'];

    protected $statusOrder = [
        self::PENDING => 'pending',
        self::ACCEPTED =>'accepted',
        self::REJECTED =>'rejected',
        self::RECEIVED => 'received',
    ];

    /**
     * Get the order's status.
     *
     * @return string
     */
    public function getStatusOrderAttribute()
    {
        return $this->statusOrder[$this->status];
    }

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
     * Order Has Many OrderDetail
     *
     * @return mixed
     */
    public function orderDetails()
    {
        return $this->hasMany('App\OrderDetail');
    }

    /**
     * Order Has Many Note
     *
     * @return mixed
     */
    public function notes()
    {
        return $this->hasMany('App\Note');
    }

    /**
     * Order Has Many TrackingOrder
     *
     * @return mixed
     */
    public function trackingOrders()
    {
        return $this->hasMany('App\TrackingOrder');
    }
}
