<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Http\Requests\StoreUsers;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;
use App\Jobs\SendEmailJob;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('userInfo')->paginate(config('define.number_pages'));
        return view('admin.user.index', compact('users'));
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
    public function store(StoreUsers $request)
    {
        $data = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password)
        ]);
        $job = (new SendEmailJob($data))->delay(now()->addSeconds(10));
                dispatch($job);
        if ($data) {
            $request->session()->flash('msg', __('user.admin.index.create_success'));
            return redirect()->route('user.index');
        }
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user User object
     *
     * @return \Illuminate\Http\Response
    */
    public function edit(User $user)
    {
        $user = $user;
        return view('admin.user.edit');
    }
}
