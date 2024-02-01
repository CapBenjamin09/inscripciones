<?php

use App\Http\Controllers\DegreeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
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
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');
Route::get('/degree', [DegreeController::class, 'index'])->name('degree.index');
Route::resource('/users', UserController::class);
Route::get('/dashboard', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('home');

//RUTEO PARA INICIO DE SESIÓN
    Route::get('/login', [SessionController::class, 'index'])->name('session.index');
    Route::post('/login', [SessionController::class, 'store'])->name('session.store');
