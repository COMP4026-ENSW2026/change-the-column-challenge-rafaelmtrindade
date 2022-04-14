<?php

use App\Http\Controllers\WEB\PetsController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/hello', [WelcomeController::class, 'index']);

Route::resource('pets', PetsController::class);

// Route::get('/pets', [PetsController::class, 'index']);

// Route::post('/pets', [PetsController::class, 'store']);

// Route::get('/pets/adicionar', [PetsController::class, 'create']);

// Route::get('/pets/{id}', [PetsController::class, 'show']);
