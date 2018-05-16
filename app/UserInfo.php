<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    protected $fillable = [
        'user_id',
        'address',
        'phone',
        'avatar',
    ];

    /**
     * UserInfo Belong To User
     *
     * @return mixed
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
    * Get the user's avatar.
    *
    * @return string
    */
    public function getAvatarUrlAttribute()
    {
        return asset(config('define.images_path_users') . $this->avatar);
    }
}
