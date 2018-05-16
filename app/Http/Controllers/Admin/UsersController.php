<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\UserInfo;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.user.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id user's id
     *
     * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        echo($id);
        return view('admin.user.edit');
    }
}
