<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

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
     * Show the form for creating a new data.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'name'=>'bail|required',
            'email'=>'bail|required|unique:users',
            'password'=>'bail|required',
            'role'=>'bail|required'
        ]);
        User::create([
            'name'=>trim($request->name),
            'email'=>trim($request->email),
            'password'=>bcrypt(trim($request->password)),
            'role'=>trim($request->role)
        ]);
        return redirect()->route('user.index');
    }
}
