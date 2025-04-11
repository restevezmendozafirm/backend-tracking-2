<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/', [App\Http\Controllers\ClientesDaznController::class, 'index'])->name('inicio');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/clientes-inmigracion', [App\Http\Controllers\InmigracionController::class, 'index'])->name('clientes_inmigracion');
Route::get('/clientes-confirmación', [App\Http\Controllers\ConfirmacionController::class, 'index'])->name('clientes_confirmacion');
Route::get('/clientes-calificados', [App\Http\Controllers\CalificadosController::class, 'index'])->name('clientes_calificados');
Route::get('/clientes-dazn', [App\Http\Controllers\ClientesDaznController::class, 'index'])->name('clientes_dazn');

Auth::routes();
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'create'])->name('register');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/logout', [App\Http\Controllers\LogoutController::class, 'perform'])->name('logout.perform');
    Route::get('/checkout', [App\Http\Controllers\CheckoutController::class, 'index'])->name('checkout');
});
