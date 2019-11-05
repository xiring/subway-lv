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
	Route::get('/meal/{id}/options','MealController@options')->name('meal.option.index');
	Route::post('/meal/option/store','MealController@optionStore')->name('meal.option.store');
	Route::get('/meal/{id}/option/delete','MealController@optionDelete')->name('meal.option.delete');
	Route::post('/meal/option/value/store','MealController@optionValueStore')->name('meal.option.value.store');
	Route::get('/meal/{id}/option/value/delete','MealController@optionValueDelete')->name('meal.option.value.delete');

	//User Orders
	Route::get('/orders', 'AdminController@orders')->name('orders');
	Route::get('/order/{id}/delete', 'AdminController@orderDelete')->name('order.delete');

	//Message Bird 
	Route::get('/messagebird', 'AdminController@messageBird')->name('messagebird');
	Route::post('/messagebird/update', 'AdminController@messageBirdUpdate')->name('messagebird.update');

});

Route::group(['prefix' => 'dashboard/user', 'middleware' => 'IsUser'], function () {

	Route::get('/', 'UserDashboardController@index')->name('user.dashboard');
	Route::post('/order/store', 'UserDashboardController@order')->name('user.order');
	Route::get('/my/orders', 'UserDashboardController@orders')->name('user.orders');
	Route::get('/my/{id}/edit/order', 'UserDashboardController@orderEdit')->name('user.order.edit');
	Route::get('/my/{id}/cancel/order', 'UserDashboardController@orderCancel')->name('user.order.cancel');
});
