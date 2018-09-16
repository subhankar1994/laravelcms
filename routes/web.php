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

//===========================admin routes ======================

//admin rotes with middleware
Route::group(['namespace' => 'Admin', 'middleware' => 'auth:admin'], function(){

	//admin user route
	Route::resource('admin/user', 'UserController');

	//admin dashboard route
	Route::get('admin/dashboard', function () {
		return view('admin.dashboard');
	});
});

//admin auth route without middleware
Route::group(['namespace' => 'Admin'], function(){

	//admin login view
	Route::get('admin/login', 'Auth\LoginController@showLoginForm')->name('admin.login');

	//admin login post
	Route::post('admin/login', 'Auth\LoginController@login');

	//admin logout
	Route::post('admin/logout', 'Auth\LoginController@logout')->name('admin.logout');

});


//===============================frontend route ================

//user view (frontend)
Route::get('/', function () {
	return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
