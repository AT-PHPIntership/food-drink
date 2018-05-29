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

Route::get('/', function () {
    return view('welcome');
});
Route::group(['namespace'=>'Admin','prefix'=>'admin'],function () {
    Route::get('',[
        'uses'=>'HomeController@index',
        'as'=>'admin'
    ]);
    Route::resource('user', 'UsersController');
    Route::resource('product', 'ProductsController');
    Route::resource('category', 'CategoriesController')->only([
        'index', 'create' , 'store'
    ]);
    Route::group(['prefix'=>'post'],function (){
        Route::get('',[
            'uses' => 'PostsController@index',
            'as' => 'admin.post.index'
        ]);
    });
    Route::resource('order', 'OrdersController')->only([
        'index',
    ]);
});
