<?php

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

Route::get('/','controllerWelcome@index')->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/restaurateur/profile', 'controllerRestaurateur@profile')->name('restaurateur.profile');
Route::put('/restaurateur/update', 'controllerRestaurateur@update')->name('restaurateur.update');
Route::get('/restaurateur/plat', 'controllerRestaurateur@plat')->name('restaurateur.plat');
Route::post('/restaurateur/store', 'controllerRestaurateur@store')->name('restaurateur.store');