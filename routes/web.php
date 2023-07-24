<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('web.index');
    })->name('dashboard');
     Route::get('/dashboard2', function () {
       // return view('web.index');
        //Artisan::call('storage:link');
        //Artisan::call('migrate:fresh --seed');
        //Artisan::call('migrate');
    })->name('dashboard');
    Route::get('/empresa', function () {
        return view('webApp.empresaApp');
    })->name('empresa');
    Route::get('/producto', function () {
        return view('webApp.productoApp');
    })->name('producto');
    Route::get('/almacen', function () {
        return view('webApp.almacenApp');
    })->name('almacen');
    Route::get('/venta', function () {
        return view('webApp.ventaApp');
    })->name('venta');
});
