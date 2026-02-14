<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnseignantController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('enseignants', EnseignantController::class);