<?php

use App\Http\Controllers\CriarOsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('criar_os', CriarOsController::class);
Route::get('/CriarOs', [CriarOsController::class, 'index'])->name('CriarOs.index');
Route::post('/CriarOs', [CriarOsController::class, 'store'])->name('CriarOs.store');
