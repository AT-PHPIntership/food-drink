<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\Http\Controllers\Api\ApiController;
use App\User;
use App\UserInfo;
use Illuminate\Support\Facades\Auth;

class ProfileController extends ApiController
{
     /**
     * Get user details
     *
     * @return json user, userInfo
     */
    public function index()
    {
        $user = Auth::user();
        $data['user'] = $user->load('userInfo');
        return $this->successResponse($data, Response::HTTP_OK);
    }
}
