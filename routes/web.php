<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TechStatsController;

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

// Route where only unauthenticated employees can access
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->middleware('throttle:5,1')->name('login-post');
});

// Route where only authenticated employees can access
Route::middleware('auth')->group(function () {

    Route::view('/', 'home');
    Route::view('/stats', 'stats');
    Route::view('/table', 'table');
    Route::view('/form', 'form');

    Route::prefix('techstats')->name('techstats.')->controller(TechStatsController::class)->group(function () {

        //Route to display the index view for technician statistics.
        Route::get('/', 'index')->name('index');
        
        //Route to handle displaying technician statistics based on the provided data.
        Route::post('/show', 'show')->name('show');
    });

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});