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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/' ,'HomeController@index')->name('home');

Auth::routes(['register' => false]);

// Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'dashboard/admin', 'middleware' => 'IsAdmin'], function () {

	Route::get('/', 'AdminController@index')->name('admin.dashboard');

	//Category
	Route::get('/user/all/', 'UserContoller@index')->name('user.index');
	Route::post('/user/store', 'UserContoller@store')->name('user.store');
	Route::post('/user/update', 'UserContoller@update')->name('user.update');
	Route::get('/user/{id}/delete','UserContoller@delete')->name('user.delete');
	Route::get('/user/{id}/restore','UserContoller@restore')->name('user.restore');

	//Meals
	Route::get('/meal/all/', 'MealController@index')->name('meal.index');
	Route::post('/meal/store', 'MealController@store')->name('meal.store');
	Route::post('/meal/update', 'MealController@update')->name('meal.update');
	Route::get('/meal/{id}/delete','MealController@delete')->name('meal.delete');
	Route::get('/meal/{id}/restore','MealController@restore')->name('meal.restore');
	Route::get('/meal/{id}/order','MealController@order')->name('meal.order.index');
	Route::post('/meal/order/store','MealController@orderStore')->name('meal.order.store');
	Route::get('/meal/{id}/order/delete','MealController@orderDelete')->name('meal.order.delete');
	Route::get('/meal/{id}/order/restore','MealController@orderRestore')->name('meal.order.restore');
});

Route::group(['prefix' => 'dashboard/user', 'middleware' => 'IsUser'], function () {

	Route::get('/', 'UserDashboardController@index')->name('user.dashboard');
	Route::get('/{id}/order', 'UserDashboardController@order')->name('user.order');
});
