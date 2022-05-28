<?php

use App\Http\Controllers\eventController;
use App\Http\Controllers\examenController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\paperworkController;
use App\Http\Controllers\pfeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home/index');
});



Route::get('/paperwork',paperworkController::class)->name('paperwork') ; 
Route::resource('paperwork',paperworkController::class ) ; 

Route::get('/event',eventController::class)->name('event') ; 
Route::resource('event',eventController::class ) ; 

Route::get('/pfe',pfeController::class)->name('pfe') ; 
Route::resource('pfe',pfeController::class ) ; 

Route::get('/examen',examenController::class)->name('examen') ; 
Route::resource('examen',examenController::class ) ; 
