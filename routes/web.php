<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;

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

    // Design routes
    Route::view('/', 'home');
    Route::view('/stats', 'stats');
    Route::view('/table', 'table');
    Route::view('/form', 'form');

    // Clients routes
    Route::prefix('clients')->group(function () {
        Route::get('/', [ClientController::class, 'index']);
    });
    
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});