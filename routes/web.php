<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
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

Route::get('/bemvindo', [EventController::class, 'index']); 

Route::get('/contatos', [EventController::class, 'contact']); 

Route::get('/events', [EventController::class, 'create']);

Route::post('/events', [EventController::class, 'store']);

 
