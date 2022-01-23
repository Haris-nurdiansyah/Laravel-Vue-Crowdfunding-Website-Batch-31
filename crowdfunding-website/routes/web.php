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

use Illuminate\Support\Facades\Route;

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/route-1', 'TestController@route_1')->middleware(['auth', 'email_verify']);

// Route::middleware(['auth', 'email_verify', 'cek_role'])->group(function () {
//     Route::get('/route-2', 'TestController@route_2');
// });

Route::view('/{any?}', 'app')->where('any', '.*');
