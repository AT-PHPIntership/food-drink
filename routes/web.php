<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['namespace'=>'Admin','prefix'=>'admin','middleware' => 'admin'],function () {
    Route::get('',[
        'uses'=>'HomeController@index',
        'as'=>'admin'
    ]);
    Route::resource('user', 'UsersController');
    Route::resource('product', 'ProductsController');
    Route::resource('category', 'CategoriesController')->except([
        'show'
    ]);
    Route::group(['prefix'=>'post'],function (){
        Route::get('',[
            'uses' => 'PostsController@index',
            'as' => 'admin.post.index'
        ]);
        Route::delete('{post}',[
            'uses' => 'PostsController@destroy',
            'as' => 'admin.post.delete'
        ]);
        Route::put('{id}/active',[
            'uses' => 'PostsController@active',
            'as' => 'admin.post.active'
        ]);
    });
    Route::resource('order', 'OrdersController')->only([
        'index', 'show'
    ]);
    Route::put('order/{order}/updateStatus', 'OrdersController@updateStatus');
});
Route::group(['prefix' => 'admin'],function (){
    Route::get('login', [
        'uses' => 'Auth\LoginController@showLoginForm',
        'as' => 'admin.login'
        ]);
        Route::post('login',[
        'uses' => 'Auth\LoginController@login',
    ]);
    Route::post('logout',[
        'uses' => 'Auth\LoginController@logout',
        'as' => 'admin.logout'
    ]);
});
Route::get('/api-docs', function () {
    return view('api-docs');
});
Route::get('/api-doc-builders', function () {
    return view('api-docs-builders.index');
});
Route::group(['namespace' => 'Home','prefix' => 'user'], function (){
    Route::get('login', [
        'uses' => 'LoginController@index',
        'as' => 'user.login'
    ]);
    Route::resource('register', 'RegisterController')->only([
        'index'
    ]);
});
//frontend
Route::group(['namespace'=>'User','prefix'=>'/'],function () {
    Route::get('',[
        'uses'=>'HomeController@index',
        'as'=>'user'
    ]);
    Route::resource('profile', 'UserController')->only([
        'index'
    ]);
    Route::resource('products', 'ProductController')->only([
        'index', 'show'
    ]);
    Route::resource('cart', 'CartController')->only([
        'index'
    ]);
    Route::resource('orderUser', 'OrderController')->only([
        'index'
    ]);
});
