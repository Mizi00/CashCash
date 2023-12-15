<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AssignmentController;

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

    //Routes for managing assignments related to interventions.
    Route::prefix('assignments')->name('assignments.')->controller(AssignmentController::class)->group(function(){
        //Display a listing of assignments.
        Route::get('/', 'index')->name('index');

        //Show the form for editing the specified intervention assignment.
        Route::get('/edit/{intervention}', 'edit')->name('edit');
        //Update the specified intervention assignment in storage.
        Route::patch('/update/{intervention}', 'update')->name('update');
    });
    
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});