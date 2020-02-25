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

Route::resource('member', 'MemberController', [
	'only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']
]);

Route::prefix('member')->name('member.')->group(function() {
    Route::get('search', 'MemberController@index')->name('search');
});

Route::resource('customer', 'CustomerController', [
	'only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']
]);

Route::prefix('customer')->name('customer.')->group(function() {
    Route::get('search', 'CustomerController@index')->name('search');
});

Route::resource('project', 'ProjectController', [
	'only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']
]);

Route::prefix('project')->name('project.')->group(function() {
    Route::get('search', 'ProjectStatusController@index')->name('search');
});

Route::resource('projectstatus', 'ProjectStatusController', [
	'only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']
]);

Route::prefix('projectstatus')->name('projectstatus.')->group(function() {
    Route::get('search', 'ProjectStatusController@index')->name('search');
});
