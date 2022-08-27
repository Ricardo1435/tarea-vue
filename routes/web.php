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
    return view('welcome');

})->name('home');

Route::prefix('/customer')->group(
    function (){

        //Rutas de vistas
        Route::get('/', [\App\Http\Controllers\CustomerController::class, 'index'])->name('customerIndex');

        Route::get('/register', [\App\Http\Controllers\CustomerController::class, 'register'])->name('customerRegister');

        Route::get('/edit/{id}',[\App\Http\Controllers\CustomerController::class, 'edit'])->name('customerEdit');

        Route::get('/show/{id}',[\App\Http\Controllers\CustomerController::class, 'show'])->name('customerShow');

        //Rutas http, peticiones al server
        Route::post('/create', [\App\Http\Controllers\CustomerController::class, 'create'])->name('customerCreate');
        Route::patch('/update/{id}', [\App\Http\Controllers\CustomerController::class, 'update'])->name('customerUpdate');
        Route::delete('/delete/{id}', [\App\Http\Controllers\CustomerController::class, 'delete'])->name('customerDelete');

    }
);

