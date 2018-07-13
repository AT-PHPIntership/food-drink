<?php

namespace App\Services;

use Laravel\Socialite\Contracts\User as ProviderUser;
use App\User;
use App\UserInfo;

class SocialAccountService
{
    /**
     * Store User when user never login
     *
     * @param \Illuminate\Http\Request $providerUser providerUser
     * @param \Illuminate\Http\Request $social       social
     *
     * @return data token
     */
    public static function createOrGetUser(ProviderUser $providerUser, $social)
    {
        $user = User::where('provider_user_id', $providerUser->id)->first();
        if (!$user) {
            $user = User::create([
                'name' => $providerUser->name,
                'email' => $providerUser->email,
                'provider_user_id' => $providerUser->id,
                'provider' => $social,
            ]);
            $user->userInfo()->create([
                'user_id' =>$user->id,
                'avatar' => UserInfo::AVATAR_DEFAULT,
            ]);
        }
        $data['token'] = $user->createToken('token')->accessToken;
        $data['user'] = $user->load('userInfo');
        return $data;
    }
}
