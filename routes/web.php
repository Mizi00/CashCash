<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\InterventionController;
use App\Http\Controllers\TechInterventionController;
use App\Http\Controllers\TechStatsController;
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

    // Design routes    
    Route::view('/stats', 'stats')->middleware('checkhelper')->name('index');
    Route::view('/table', 'table');
    Route::view('/form', 'form');

    // Routes related to managing technical interventions allowed only by technician.
    Route::prefix('techinterventions')->middleware('checktechnician')->name('techinterventions.')->controller(TechInterventionController::class)->group(function () {
        //Display the list of technician's interventions.
        Route::get('/', 'index')->name('index');

        //Show the validation view for a specific intervention.
        Route::get('/validate/{intervention}', 'validateIntervention')->name('validate');
        //Update intervention details based on the provided request and intervention instance.
        Route::patch('/update/{intervention}', 'update')->name('update');

        //Generate a PDF for the provided intervention.
        Route::get('/pdf/{intervention}', 'generatePDF')->name('pdf');
    });

    // Route only allowed for helpers
    Route::middleware('checkhelper')->group(function () {

        // Clients routes
        Route::prefix('clients')->name('clients.')->controller(ClientController::class)->group(function () {
            Route::get('/', 'index')->name('index');

            Route::get('/show/{client}', 'show')->name('show');
            
            Route::get('/edit/{client}', 'edit')->name('edit');
            Route::patch('/update/{client}', 'update')->name('update');
        });

        // Group of routes related to interventions
        Route::prefix('interventions')->name('interventions.')->controller(InterventionController::class)->group(function () {
            Route::get('/', 'index')->name('index'); // Display a listing of interventions

            Route::get('/show/{intervention}', 'show')->name('show'); // Display the specified intervention

            Route::get('/edit/{intervention}', 'edit')->name('edit'); // Show the form for editing the specified intervention
            Route::patch('/update/{intervention}', 'update')->name('update'); // Update the specified intervention in database

            Route::get('/pdf/{intervention}', 'generatePDF')->name('pdf');
        });

        Route::prefix('techstats')->name('techstats.')->controller(TechStatsController::class)->group(function () {

            //Route to display the index view for technician statistics.
            Route::get('/', 'index')->name('index');

            //Route to handle displaying technician statistics based on the provided data.
            Route::post('/show', 'show')->name('show');
        });

        //Routes for managing assignments related to interventions.
        Route::prefix('assignments')->name('assignments.')->controller(AssignmentController::class)->group(function () {
            //Display a listing of assignments.
            Route::get('/', 'index')->name('index');

            //Show the form for editing the specified intervention assignment.
            Route::get('/edit/{intervention}', 'edit')->name('edit');
            //Update the specified intervention assignment in storage.
            Route::patch('/update/{intervention}', 'update')->name('update');
        });
    });

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
