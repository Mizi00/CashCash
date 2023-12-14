<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TechInterventionController;

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

    // Routes related to managing technical interventions.
    Route::prefix('techinterventions')->name('techinterventions.')->controller(TechInterventionController::class)->group(function () {
        //Display the list of technician's interventions.
        Route::get('/', 'index')->name('index');

        //Show the validation view for a specific intervention.
        Route::get('/validate/{intervention}', 'validateIntervention')->name('validate');
        //Update intervention details based on the provided request and intervention instance.
        Route::patch('/update/{intervention}', 'update')->name('update');
        
        //Generate a PDF for the provided intervention.
        Route::get('/pdf/{intervention}', 'generatePDF')->name('pdf');
    });
    
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});