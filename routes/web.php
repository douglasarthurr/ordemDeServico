<?php

<<<<<<< HEAD
use App\Http\Controllers\CriarOsController;
=======
use App\Http\Controllers\ProfileController;
>>>>>>> 001425659031f050f43612baf930459e504142da
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;

Route::get('/', function () {
    return view('welcome');
});

<<<<<<< HEAD
Route::resource('criar_os', CriarOsController::class);
Route::get('/CriarOs', [CriarOsController::class, 'index'])->name('CriarOs.index');
Route::post('/CriarOs', [CriarOsController::class, 'store'])->name('CriarOs.store');
=======

// Formulário de cadastro customizado
Route::get('/cad', function () {
    return view('cad'); // Esta view já está criada
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
>>>>>>> 001425659031f050f43612baf930459e504142da
