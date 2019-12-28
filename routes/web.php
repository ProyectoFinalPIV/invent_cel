<?php

/*
|--------------------------------------------------------------------------
| Rutas web --> este va luego de la migracion de la BD
|--------------------------------------------------------------------------
|
| Aquí es donde puede registrar rutas web para su aplicación. estos
| RouteServiceProvider (Proveedor de servicios de ruta) carga las rutas
| dentro de un grupo que contiene el grupo de middleware "web".
| ¡Ahora crea algo genial!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('productos','productosController');
Route::resource('asesores','asesoresController');
/*Route::resource('locales','localesController');
Route::resources('movimientos','movimientosController');
Route::resources('proveedores','proveedoresController');
Route::resources('roles','rolesController');
Route::resources('stocks','stocksController');
Route::resources('users','usersController');
Route::resources('usuarios_roles','usuarios_rolesController');
Route::resources('','');*/

/*
|--------------------------------------------------------------------------
| Luego de la construcción de rutas sigue agregar los archivos controlador
| y modelo.
| para la creacion del controlador se ejecuta en cmd:
| C:\xampp\htdocs\proyecto>php artisan make:controller productosController
| este comando se usa cada que se crea una ruta para un nuevo controllador
|--------------------------------------------------------------------------
|--------------------------------------------------------------------------
| El controlador se ubicará en app/http/controllers
| El modelo se ubicará en app/(modelo.php)
|--------------------------------------------------------------------------
*/