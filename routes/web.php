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

Route::get('/', 'HomeController@index');

//Ruta normal usando controlador
//Route::get('admin/permiso', 'Admin\PermissionController@index')->name('permiso');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('permiso', 'PermissionController@index')->name('permiso');
    Route::get('permiso/crear', 'PermissionController@create')->name('permiso-crear');
});