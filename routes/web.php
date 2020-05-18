<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home', 'HomeController@handleSubmits');
Route::get('/profile/{id}', 'ProfileController@index')->name('profile');
Route::post('/profile/{id}', 'ProfileController@handleSubmits');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

