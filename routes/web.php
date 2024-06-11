<?php

use App\Http\Controllers\InstagramAPIController;
use App\Http\Controllers\NumberService;
use App\Http\Controllers\Practicecontroller;
use App\Http\Controllers\NumberPracticecontroller;
use App\Http\Controllers\WeatherAPIController;
use Illuminate\Support\Facades\Route;

//csv
Route::get('/import', [Practicecontroller::class, 'importCSV'])->name('import');
Route::post('/uploadCSV', [Practicecontroller::class, 'uploadCSV'])->name('upload');

//form
Route::get('/indexForm', [Practicecontroller::class, 'index']);
Route::post('/store', [Practicecontroller::class, 'store'])->name('store');

//fakeData
Route::get('/fakeData', [Practicecontroller::class, 'fakeData']);

//Array
Route::get('/arrayFunctions', [Practicecontroller::class, 'arrayFunctions']);
Route::get('/array', [NumberPracticecontroller::class, 'array'])->name('array');

//path, carbon and other functions
Route::get('/index', [NumberPracticecontroller::class, 'index']);

//string
Route::get('/string', [NumberPracticecontroller::class, 'string'])->name('string');

//number
Route::get('/number', [NumberPracticecontroller::class, 'number'])->name('number');

//url
Route::get('/', [NumberPracticecontroller::class, 'url'])->name('url');

//new class NumberService
// Route::get('/all', [NumberService::class, 'all'])->name('all');

//weather API
Route::match(['get', 'post'], 'weatherAPI', [WeatherAPIController::class, 'index'])->name('weather.form');

//instagram API
Route::match(['get', 'post'], 'instagramAPI', [InstagramAPIController::class, 'index'])->name('instagram.form');