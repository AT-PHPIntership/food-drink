<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ResetPasswordController extends Controller
{
    /**
    * Display the password reset view for the given token.
    *
    * If no token is present, display the link request form.
    *
    * @param string null $token reset token
    *
    * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
    */
    public function index($token = null)
    {
        return view('public.pages.new-password', ['token' => $token]);
    }
}
