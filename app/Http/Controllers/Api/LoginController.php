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
            return $this->errorResponse(config('define.login.unauthorised'), Response::HTTP_UNAUTHORIZED);
        }
    }

    /**
     * Get user details
     *
     * @return json user, userInfo
     */
    public function detail()
    {
        $user = Auth::user();
        $data['user'] = $user->load('userInfo');
        return $this->successResponse($data, Response::HTTP_OK);
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
        DB::table('oauth_refresh_tokens')
            ->where('access_token_id', $accessToken->id)
            ->update([
                'revoked' => true
            ]);
        $accessToken->revoke();
        $user->save();
        return $this->successResponse(null, Response::HTTP_NO_CONTENT);
    }
}
