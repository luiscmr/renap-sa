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

/* Route::prefix('usuarios')->group(function() {
    Route::get('/', 'UsuariosController@index');
}); */

Route::group(['middleware' => ['web'], 'prefix' => 'usuarios'], function() {
    
    Route::middleware(['auth:acceso'])->group(function()
    {
        Route::get('usuarios',                  'UsuariosController@index')->name('dashboard.usuarios.index');
        Route::post('usuarios',                 'UsuariosController@store') ->name('dashboard.usuarios.store');
        Route::get('usuarios/crear',            'UsuariosController@create')->name('dashboard.usuarios.create');
        Route::get('usuarios/{usuario}',        'UsuariosController@show')->name('dashboard.usuarios.show');
        Route::get('usuarios/{usuario}/editar', 'UsuariosController@edit')->name('dashboard.usuarios.edit');
        Route::patch('usuarios/{usuario}',      'UsuariosController@update')->name('dashboard.usuarios.update');
        Route::delete('usuarios/{usuario}',     'UsuariosController@destroy')->name('dashboard.usuarios.destroy');

        
        Route::get('roles',                       'RolesController@index')->name('dashboard.roles.index');
        Route::post('roles',                      'RolesController@store') ->name('dashboard.roles.store');
        Route::get('roles/crear',                 'RolesController@create')->name('dashboard.roles.create');
        Route::get('roles/{rol}',                 'RolesController@show')->name('dashboard.roles.show');
        Route::get('roles/{rol}/editar',          'RolesController@edit')->name('dashboard.roles.edit');
        Route::patch('roles/{rol}',               'RolesController@update')->name('dashboard.roles.update');
        Route::delete('roles/{rol}',              'RolesController@destroy')->name('dashboard.roles.destroy');
        
        
        Route::get('permisos',                       'PermisosController@index')->name('dashboard.permisos.index');
        Route::post('permisos',                      'PermisosController@store') ->name('dashboard.permisos.store');
        Route::get('permisos/crear',                 'PermisosController@create')->name('dashboard.permisos.create');
        Route::get('permisos/{permiso}',             'PermisosController@show')->name('dashboard.permisos.show');
        Route::get('permisos/{permiso}/editar',      'PermisosController@edit')->name('dashboard.permisos.edit');
        Route::patch('permisos/{permiso}',           'PermisosController@update')->name('dashboard.permisos.update');
        Route::delete('permisos/{permiso}',          'PermisosController@destroy')->name('dashboard.permisos.destroy');
    });
});