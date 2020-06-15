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


Route::get('/client/profile', 'controllerClient@profile')->name('client.profile');
Route::put('/client/update', 'controllerClient@update')->name('client.update');
Route::get('/client/{id}/commande', 'controllerClient@commande')->name('client.commande');
Route::put('/client/update_user', 'controllerClient@update_user')->name('client.update_user');


Route::get('/restaurateur/profile', 'controllerRestaurateur@profile')->name('restaurateur.profile');
Route::put('/restaurateur/update', 'controllerRestaurateur@update')->name('restaurateur.update');
Route::get('/restaurateur/plat', 'controllerRestaurateur@plat')->name('restaurateur.plat');
Route::post('/restaurateur/store', 'controllerRestaurateur@store')->name('restaurateur.store');
Route::get('/restaurateur/{id}/delete', 'controllerRestaurateur@delete')->name('restaurateur.delete');
Route::get('/restaurateur/{id}/modifier', 'controllerRestaurateur@modifier')->name('restaurateur.modifier');
Route::put('/restaurateur/{id}/update_plat', 'controllerRestaurateur@update_plat')->name('restaurateur.update_plat');

Route::get('/admin/client', 'controllerAdministrateur@client')->name('admin.client');
Route::get('/admin/{id_user}/detail', 'controllerAdministrateur@detail')->name('admin.detail');
Route::get('/admin/{id_user}/modif_vue', 'controllerAdministrateur@modif_vue')->name('admin.modif_vue');
Route::put('/admin/{id_user}/modif', 'controllerAdministrateur@modif')->name('admin.modif');
Route::get('/admin/{id_user}/suppr', 'controllerAdministrateur@suppr')->name('admin.suppr');


Route::get('/admin/restaurateur', 'controllerAdministrateur@restaurateur')->name('admin.restaurateur');