<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * User Belong To UserInfo
     *
     * @return mixed
     */
    public function userInfo()
    {
        return $this->hasOne('App\UserInfo', 'user_id', 'id');
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
