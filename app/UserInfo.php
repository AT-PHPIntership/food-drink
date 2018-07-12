<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserInfo extends Model
{
    use SoftDeletes;

    const AVATAR_DEFAULT = 'default-user-avatar.png';
    
    protected $fillable = [
        'user_id',
        'address',
        'phone',
        'avatar',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['avatar_url'];

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

    /**
    * Get the product's image.
    *
    * @return string
    */
    public function getImageUrlAttribute()
    {
        return asset(config('define.images_path_users') . $this->avatar);
    }
}
