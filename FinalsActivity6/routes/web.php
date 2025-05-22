<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimeController;
use App\Http\Controllers\WeatherController;

Route::get('/anime/{title}', [AnimeController::class, 'search']);
Route::get('/weather', [WeatherController::class, 'showWeather']);



