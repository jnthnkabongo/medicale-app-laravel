<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\dashController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\indexController;
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

Route::get('/', [authController::class, 'index'])->name('page-accueil');
Route::post('/', [authController::class, 'login'])->name('soumission');
Route::get('gestion-app', [homeController::class, 'index'])->name('redirect');
Route::get('logout', [authController::class, 'destroy'])->name('index');

Route::middleware(['users'])->group(function () {
    Route::get('index', [indexController::class, 'index'])->name('index');
});

Route::middleware(['administration'])->group(function () {
    Route::get('dashboard', [dashController::class, 'index'])->name('administration');
});
