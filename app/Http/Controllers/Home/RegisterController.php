<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    /**
    * Display a user info .
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        return view('user.register.register');
    }
}
