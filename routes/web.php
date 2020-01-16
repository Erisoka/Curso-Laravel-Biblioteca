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

Route::get('/', 'HomeController@index')->name('inicio');

/*RUTAS PASSWORD RESET*/
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

Route::get('seguridad/login', 'Seguridad\LoginController@index')->name('login');
Route::post('seguridad/login', 'Seguridad\LoginController@login')->name('login_post');
Route::get('seguridad/logout', 'Seguridad\LoginController@logout')->name('logout');
Route::post('ajax-sesion', 'AjaxController@setSession')->name('ajax')->middleware('auth');

//Ruta normal usando controlador
//Route::get('admin/permiso', 'Admin\PermissionController@index')->name('permiso');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'superadmin']], function () {

    Route::get('', 'AdminController@index'); // ruta /admin

    /*RUTAS DE USUARIO*/
    Route::get('usuario', 'UsuarioController@index')->name('usuario');
    Route::get('usuario/crear', 'UsuarioController@crear')->name('crear_usuario');
    Route::post('usuario', 'UsuarioController@guardar')->name('guardar_usuario');
    Route::get('usuario/{id}/editar', 'UsuarioController@editar')->name('editar_usuario');
    Route::put('usuario/{id}', 'UsuarioController@actualizar')->name('actualizar_usuario');
    Route::delete('usuario/{id}', 'UsuarioController@eliminar')->name('eliminar_usuario');

    /*RUTAS DE PERMISO*/
    Route::get('permiso', 'PermissionController@index')->name('permiso');
    Route::get('permiso/crear', 'PermissionController@create')->name('crear_permiso');
    Route::post('permiso', 'PermissionController@store')->name('guardar_permiso');
    Route::get('permiso/{id}/editar', 'PermissionController@edit')->name('editar_permiso');
    Route::put('permiso/{id}', 'PermissionController@update')->name('actualizar_permiso');
    Route::delete('permiso/{id}', 'PermissionController@destroy')->name('eliminar_permiso');
    
    /* RUTAS DEL MENU */
    Route::get('menu', 'MenuController@index')->name('menu');
    Route::get('menu/crear', 'MenuController@create')->name('crear_menu');
    Route::post('menu', 'MenuController@store')->name('guardar_menu');
    Route::get('menu/{id}/editar', 'MenuController@edit')->name('editar_menu');
    Route::put('menu/{id}', 'MenuController@update')->name('actualizar_menu');
    Route::get('menu/{id}/eliminar', 'MenuController@destroy')->name('eliminar_menu');
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

     /*RUTAS PERMISO_ROL*/
     Route::get('permiso-rol', 'PermisoRolController@index')->name('permiso_rol');
     Route::post('permiso-rol', 'PermisoRolController@guardar')->name('guardar_permiso_rol');
});

/*RUTAS LIBRO*/
Route::get('libro', 'LibroController@index')->name('libro')->middleware('auth');
Route::get('libro/crear', 'LibroController@crear')->name('crear_libro')->middleware('auth');
Route::post('libro', 'LibroController@guardar')->name('guardar_libro')->middleware('auth');
Route::post('libro/{libro}', 'LibroController@ver')->name('ver_libro')->middleware('auth');
Route::get('libro/{id}/editar', 'LibroController@editar')->name('editar_libro')->middleware('auth');
Route::put('libro/{id}', 'LibroController@actualizar')->name('actualizar_libro')->middleware('auth');
Route::delete('libro/{id}', 'LibroController@eliminar')->name('eliminar_libro')->middleware('auth');
/**
 * Rutas Libro Prestamo
 */
Route::get('libro-prestamo', 'LibroPrestamoController@index')->name('libro-prestamo')->middleware('auth');
Route::get('libro-prestamo/crear', 'LibroPrestamoController@crear')->name('libro-prestamo.crear')->middleware('auth');
Route::post('libro-prestamo', 'LibroPrestamoController@guardar')->name('libro-prestamo.guardar')->middleware('auth');