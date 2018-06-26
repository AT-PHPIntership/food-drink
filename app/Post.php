<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Post extends Model
{
    use Sortable;
    const PAGINATE = 10, ENABLE = 1, DISABLE = 0;
    const COMMENT = 1, REVIEW = 2;
    
    public static $listStatus = [
        'enable' => 1,
        'disable' => 0
    ];
    
    protected $fillable = [
        'product_id',
        'user_id',
        'content',
        'rate',
        'type',
        'status',
    ];

    public $sortable = [
        'id',
        'rate',
        'updated_at',
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
     * Post Belong To OrderDetail
     *
     * @return mixed
     */
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
