<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApartmentController;


Route::get('/apartment', [ApartmentController::class, 'index'])->name('apiindex');
Route::post('/apartment', [ApartmentController::class,'store'])->name('apistore');
Route::get('/apartment/{id}', [ApartmentController::class, 'show'])->name('apishow');