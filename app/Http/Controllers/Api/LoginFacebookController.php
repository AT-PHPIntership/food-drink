<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Controller;

class LoginController extends ApiController
{
    /**
     * Login facebook
     *
     * @param \Illuminate\Http\Request $request facebook access token
     *
     * @return json authentication code
     */
    public function login()
    {
        dd(ad);
        return view('public.pages.login');
    }
}
