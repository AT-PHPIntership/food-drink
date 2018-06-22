<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\Http\Controllers\Api\ApiController;
use App\User;
use App\UserInfo;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DB;

class LoginController extends ApiController
{
    /**
     * Login as user
     *
     * @return json authentication code
     */
    public function login()
    {
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();
            $data['token'] =  $user->createToken('token')->accessToken;
            $data['user'] = $user->load('userInfo');
            return $this->successResponse($data, Response::HTTP_OK);
        } else {
            return $this->errorResponse(trans('login.user.unauthorised'), Response::HTTP_UNAUTHORIZED);
        }
    }

    /**
     * Logout
     *
     * @return 204
     */
    public function logout()
    {
        $user = Auth::user();
        $accessToken = $user->token();
        $accessToken->revoke();
        return $this->successResponse(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * Check access token api
     *
     * @return \Illuminate\Http\Response
     */
    public function checkAccessToken()
    {
        if (Auth::user()) {
            $user = Auth::user();
            return $this->successResponse($user, Response::HTTP_OK);
        }
    }
}
