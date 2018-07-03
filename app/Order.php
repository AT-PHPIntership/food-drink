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

    protected $statusOrder = [
        self::PENDING => 'pending',
        self::ACCEPTED =>'accepted',
        self::REJECTED =>'rejected',
        self::RECEIVED => 'received',
    ];

    /**
     * Get the order's status.
     *
     * @param string $status order's status
     *
     * @return string
     */
    public function getStatusAttribute($status)
    {
        return $this->statusOrder[$status];
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
     * Order Belong To OrderDetail
     *
     * @return mixed
     */
    public function orderDetails()
    {
        return $this->hasMany('App\OrderDetail');
    }

    /**
     * Order Belong To Note
     *
     * @return mixed
     */
    public function note()
    {
        return $this->hasOne('App\Note');
    }
}
