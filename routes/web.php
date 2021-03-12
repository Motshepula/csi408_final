si<?php

use Illuminate\Support\Facades\Route;

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

//auth route for both
Route::group(['middleware' =>['auth']], function(){
	Route::get('/dashboard','App\Http\Controllers\DashboardController@index')->name('dashboard');
});

// for users
Route::group(['middleware' => ['auth', 'role:user']], function() { 
    Route::get('/dashboard/profile', 'App\Http\Controllers\DashboardController@profile')->name('dashboard.profile');
});

// for company
Route::group(['middleware' => ['auth', 'role:company']], function() { 
    Route::get('/dashboard/advert', 'App\Http\Controllers\DashboardController@advert')->name('dashboard.advert');
});


//auth route for both


require __DIR__.'/auth.php';
