<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\WeatherController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/search', [WeatherController::class, 'search'])->name('weather.search');
