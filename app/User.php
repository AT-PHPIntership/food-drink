<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\UserInfo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;
use App\SearchTrait;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes, SearchTrait, Sortable;

     /**
     * User role
     *
     * @type int
     */
    const ROLE_USER = 0;
    const ROLE_ADMIN = 1;
    
    protected $search = [
        'name',
        'email'
    ];
    
    public $sortable = [
        'id',
        'name',
        'email',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'deleted_at',
    ];

    /**
     * User Belong To UserInfo
     *
     * @return mixed
     */
    public function userInfo()
    {
        return $this->hasOne(UserInfo::class)->withTrashed();
    }

    /**
     * User Has Many Posts
     *
     * @return mixed
     */
    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    /**
     * User Has Many Orders
     *
     * @return mixed
     */
    public function orders()
    {
        return $this->hasMany('App\Order');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
