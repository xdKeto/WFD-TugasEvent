<?php

use App\Http\Controllers\eventController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\organizerController;
use App\Http\Controllers\categoriesController;

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

Route::get('/', [eventController::class, 'index'])->name('events/index');


Route::resource('events', eventController::class);
Route::get('master/events', [eventController::class, 'master'])->name('master.events.index');

Route::resource('master/categories', categoriesController::class);
Route::resource('master/organizer', organizerController::class);