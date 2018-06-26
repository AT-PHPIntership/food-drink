<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['namespace' => 'Api'], function () {
    Route::apiResource('products', 'ProductController')->only([
        'index', 'show'
    ]);
    Route::apiResource('categories', 'CategoryController')->only([
        'index'
    ]);
    Route::get('posts', 'ProductController@getPosts');
    Route::post('login', 'LoginController@login');
    Route::group(['middleware'=>'auth:api'], function () {
        Route::get('profile', 'ProfileController@show');
        Route::post('logout', 'LoginController@logout');
        Route::apiResource('orders', 'OrderController')->only([
            'index'
        ]);
        Route::apiResource('posts', 'PostController')->only([
            'destroy'
        ]);
        Route::post('products/{product}/posts', 'PostController@store');
    });
    Route::get('products/{product}/posts', 'ProductController@getPosts');
    Route::post('register', 'RegisterController@register');
});
