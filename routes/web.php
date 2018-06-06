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
Route::get('/api-docs', function () {
    return view('api-docs');
});
Route::get('/api-doc-builders', function () {
    return view('api-docs-builders.index');
});

//frontend
Route::get('home', 'HomeController@index');
