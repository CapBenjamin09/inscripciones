<?php

use App\Http\Controllers\DegreeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ScheduleController;
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

Route::middleware(['guest'])->group( function (){
    //RUTEO PARA INICIO DE SESIÓN
    Route::get('/login', [SessionController::class, 'index'])->name('session.index');
    Route::post('/login', [SessionController::class, 'store'])->name('session.store');
});

Route::middleware(['auth'])->group( function () {
    Route::resource('/degree', DegreeController::class);

    Route::resource('/users', UserController::class);
    Route::resource('/students', UserController::class);
    Route::resource('/schedules', ScheduleController::class);


    Route::get('/home', function () {
        return view('home');
    })->name('home');
});







