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

Route::get('/', function () {
    return view('app');
});

Route::prefix('auth')->group(function(){
    Route::post('init','UsuarioController@init');
    Route::post('logout','UsuarioController@logout');
    Route::post('login','UsuarioController@login');
    Route::post('register','UsuarioController@register');
    Route::post('update','UsuarioController@update');
    Route::post('imagen','UsuarioController@imagen');
});

Route::prefix('referidos')->group(function(){
    Route::get('listado','ReferidosController@listado');
});

Route::prefix('ticket')->group(function(){
    Route::post('crear','TicketController@crear');
    Route::get('listado','TicketController@listado');
});