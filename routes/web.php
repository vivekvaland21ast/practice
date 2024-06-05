<?php

use App\Http\Controllers\Practicecontroller;
use App\Http\Controllers\NumberPracticecontroller;
use Illuminate\Support\Facades\Route;

Route::get('/index', [Practicecontroller::class, 'index']);
Route::get('/index2', [Practicecontroller::class, 'index2']);
Route::get('/index', [NumberPracticecontroller::class, 'index']);
Route::post('/store', [Practicecontroller::class, 'store'])->name('store');
Route::get('/', [Practicecontroller::class, 'importCSV'])->name('import');
Route::post('/uploadCSV', [Practicecontroller::class, 'uploadCSV'])->name('upload');


