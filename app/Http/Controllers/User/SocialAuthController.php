<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Services\SocialAccountService;
use Illuminate\Support\Facades\Log;
use Socialite;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class SocialAuthController extends ApiController
{
    /**
     * Redirect to social to get the data user
     *
     * @param \Illuminate\Http\Request $social social
     *
     * @return facebook get data user
     */
    public function redirect($social)
    {
        return Socialite::driver($social)->redirect();
    }

    /**
     * Give a json succsess Resonse Create User or login User
     *
     * @param \Illuminate\Http\Request $social social
     *
     * @return \Illuminate\Http\Response
     */
    public function callback($social)
    {
        $data = SocialAccountService::createOrGetUser(Socialite::driver($social)->user(), $social);
        return $this->successResponse($data, Response::HTTP_OK);
    }
}
