<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JokeController;

Route::get('/joke', [JokeController::class, 'fetchJoke']);

