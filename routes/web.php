<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpaceController;
use App\Http\Controllers\EventController;


// API ROUTES
Route::prefix('api')->group(function () {
   
    Route::get('/events', [EventController::class, 'api_index']);
    Route::get('/upcoming_events', [EventController::class, 'upcoming']);

 });

// HTML
 Route::get('/', function () {
        return view('welcome');
    });
   Route::get('/events', [EventController::class, 'index']);       
   Route::get('/createEvent', [EventController::class, 'create']);   
   Route::post('/createEvent', [EventController::class, 'store']);   
   Route::get('/updateEvent/{event}', [EventController::class, 'edit'])->name('events.edit');  
   Route::put('/updateEvent/{event}', [EventController::class, 'update'])->name('events.update');
   Route::get('/showEvent/{event}', [EventController::class, 'show']);
   Route::delete('/deleteEvent/{event}', [EventController::class, 'delete']);
   

