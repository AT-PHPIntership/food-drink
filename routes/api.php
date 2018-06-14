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
        Route::post('logout','LoginController@logout');
        Route::post('detail','LoginController@detail');
    });
    Route::get('products/{product}/posts', 'ProductController@getPosts');
});
