<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrackController;
 

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [TrackController::class, 'index'])->name('tracks.index');
Route::get('/tracks/create', [TrackController::class, 'create'])->name('tracks.create');
Route::post('/tracks', [TrackController::class, 'store'])->name('tracks.store');


