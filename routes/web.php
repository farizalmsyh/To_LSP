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

Route::get('/', 'HomeController@index')->name('home');

Route::prefix('menu')->group(function(){
	Route::get('/', 'Page\MenuController@index')->name('page.menu');
});

Route::prefix('chart')->group(function(){
	Route::get('/', 'Page\ChartController@index')->name('page.chart');
	Route::get('create', 'Page\ChartController@create')->name('page.chart.create');
	Route::post('save', 'Page\ChartController@save')->name('page.chart.save');
	Route::get('destination', 'Page\ChartController@destination')->name('page.chart.destination');
	Route::get('delete/{id}', 'Page\ChartController@delete')->name('page.chart.delete');
});

Route::prefix('address')->group(function(){
	Route::get('/', 'Page\AddressController@index')->name('page.address');
	Route::get('create', 'Page\AddressController@create')->name('page.address.create');
	Route::post('save', 'Page\AddressController@save')->name('page.address.save');
});

Route::prefix('transaction')->group(function(){
	Route::get('/', 'Page\TransactionController@index')->name('page.transaction');
	Route::post('save-temp', 'Page\TransactionController@saveTemp')->name('page.transaction.save-temp');
	Route::get('cancel/{id}', 'Page\TransactionController@cancelTransaction')->name('page.transaction.cancel');
	Route::get('accept/{id}', 'Page\TransactionController@acceptTransaction')->name('page.transaction.accept');
	Route::get('delete/{id}', 'Page\TransactionController@deleteTransaction')->name('page.transaction.delete');
});

Auth::routes();

Route::prefix('dashboard')->group(function(){
	Route::prefix('panel')->group(function(){
		Route::get('/', 'DashboardController@index')->name('dashboard');
	});
	Route::prefix('category')->group(function(){
		Route::get('/', 'CategoryController@index')->name('category');
		Route::get('create', 'CategoryController@create')->name('category.create');
		Route::post('save', 'CategoryController@save')->name('category.save');
		Route::get('edit/{id}', 'CategoryController@edit')->name('category.edit');
		Route::post('update/{id}', 'CategoryController@update')->name('category.update');
		Route::get('delete/{id}', 'CategoryController@delete')->name('category.delete');
	});
	Route::prefix('menu')->group(function(){
		Route::get('/', 'MenuController@index')->name('menu');
		Route::get('create', 'MenuController@create')->name('menu.create');
		Route::post('save', 'MenuController@save')->name('menu.save');
		Route::get('edit/{id}', 'MenuController@edit')->name('menu.edit');
		Route::post('update/{id}', 'MenuController@update')->name('menu.update');
		Route::get('delete/{id}', 'MenuController@delete')->name('menu.delete');
	});
	Route::prefix('users')->group(function(){
		Route::get('/', 'UsersController@index')->name('users');
		Route::get('create', 'UsersController@create')->name('users.create');
		Route::post('save', 'UsersController@save')->name('users.save');
		Route::get('edit/{id}', 'UsersController@edit')->name('users.edit');
		Route::post('update/{id}', 'UsersController@update')->name('users.update');
		Route::get('delete/{id}', 'UsersController@delete')->name('users.delete');
	});
	Route::prefix('transaction')->group(function(){
		Route::get('/', 'TransactionController@index')->name('transaction');
		Route::post('accept/{id}', 'TransactionController@acceptTransaction')->name('transaction.accept');
		Route::get('cancel/{id}', 'TransactionController@cancelTransaction')->name('transaction.cancel');
		Route::get('delete/{id}', 'TransactionController@deleteTransaction')->name('transaction.delete');
	});
	Route::prefix('order')->group(function(){
		Route::get('/', 'OrderController@index')->name('order');
		Route::get('arrive/{id}', 'OrderController@arriveTransaction')->name('order.arrive');
	});
});


