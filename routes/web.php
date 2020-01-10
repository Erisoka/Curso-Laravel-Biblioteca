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

Route::get('/', 'HomeController@index')->name('inicio');

Route::get('seguridad/login', 'Seguridad\LoginController@index')->name('login');
Route::post('seguridad/login', 'Seguridad\LoginController@login')->name('login_post');
Route::get('seguridad/logout', 'Seguridad\LoginController@logout')->name('logout');
Route::post('ajax-sesion', 'AjaxController@setSession')->name('ajax')->middleware('auth');

//Ruta normal usando controlador
//Route::get('admin/permiso', 'Admin\PermissionController@index')->name('permiso');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'superadmin']], function () {

    Route::get('', 'AdminController@index'); // ruta /admin

    Route::get('permiso', 'PermissionController@index')->name('permiso');
    Route::get('permiso/crear', 'PermissionController@create')->name('crear_permiso');
    
    /* RUTAS DEL MENU */
    Route::get('menu', 'MenuController@index')->name('menu');
    Route::get('menu/crear', 'MenuController@create')->name('crear_menu');
    Route::post('menu', 'MenuController@store')->name('guardar_menu');
    Route::post('menu/guardar-orden', 'MenuController@guardarOrden')->name('guardar_orden');

     /*RUTAS ROL*/
     Route::get('rol', 'RoleController@index')->name('rol');
     Route::get('rol/crear', 'RoleController@create')->name('crear_rol');
     Route::post('rol', 'RoleController@store')->name('guardar_rol');
     Route::get('rol/{id}/editar', 'RoleController@edit')->name('editar_rol');
     Route::put('rol/{id}', 'RoleController@update')->name('actualizar_rol');
     Route::delete('rol/{id}', 'RoleController@destroy')->name('eliminar_rol');

    /*RUTAS MENU_ROL*/
    Route::get('menu-rol', 'MenuRoleController@index')->name('menu_rol');
    Route::post('menu-rol', 'MenuRoleController@guardar')->name('guardar_menu_rol');
});