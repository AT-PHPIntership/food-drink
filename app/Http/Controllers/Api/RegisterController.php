<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\StoreUsers;
use App\User;
use App\UserInfo;

class RegisterController extends ApiController
{
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function register(StoreUsers $request)
    {
        try {
            $user = User::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>bcrypt($request->password)
            ]);
            if ($request->hasFile('avatar')) {
                $image = $request->file('avatar');
                $newName = time().'_'.md5(rand(0, 99999)).'.'.$image->getClientOriginalExtension();
                $image->move(public_path(config('define.images_path_users')), $newName);
                UserInfo::create([
                        'user_id' =>$user->id,
                        'address' => $request->address,
                        'phone' => $request->phone,
                        'avatar' => $newName,
                    ]);
            } else {
                $image = 'default-user-avatar.png';
                UserInfo::create([
                        'user_id' =>$user->id,
                        'address' => $request->address,
                        'phone' => $request->phone,
                        'avatar' => $image,
                    ]);
            }
            $data['token'] = $user->createToken('token')->accessToken;
            $data['user'] = $user->load('userInfo');
            return $this->successResponse($data, Response::HTTP_OK);
        } catch (Exception $e) {
            return $this->errorResponse(__('api.register.error.register'), Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }
}
