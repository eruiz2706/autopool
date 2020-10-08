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
    Route::post('actualizar','TicketController@actualizar');
    Route::post('cerrar','TicketController@cerrar');
    Route::get('listado','TicketController@listado');
    Route::get('indicadores','TicketController@indicadores');
    Route::get('edit/{id}','TicketController@editar');
});


Route::prefix('deposite')->group(function(){
    Route::post('crear','DepositoController@crear');
    Route::get('historial', 'DepositoController@historial'); 
});

Route::prefix('pools')->group(function(){
    Route::get('listado','PoolsController@listado');
    Route::post('comprar','PoolsController@comprar');
});

Route::prefix('dashboard')->group(function(){
    Route::get('indicadores','DashboardController@indicadores');
});
