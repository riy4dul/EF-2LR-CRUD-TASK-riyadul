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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logout',function(){
    Auth::logout();
    return redirect('/');

});

Route::group(['middleware' =>'auth' , 'namespace' => 'backend'], function(){
    Route::get('post-list','PostController@index')->name('postList');
    Route::get('category-list','CategoryController@index')->name('categoryList');
    Route::get('contact','ContactController@index')->name('contactWithMe');
});