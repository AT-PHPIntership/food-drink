<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ForgotPasswordController extends Controller
{
    /**
    * Display the form to request a password reset link.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        return view('public.pages.reset-password');
    }
}
