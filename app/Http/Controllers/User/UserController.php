<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
    * Display a user info .
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        return view('user.info.userInfo');
    }
}
