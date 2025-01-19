<?php



use App\Http\Controllers\ProfileController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\OrdemController;

Route::get('/', function () {
    return view('boas-vindas');
});



// Formulário de cadastro customizado
Route::get('/cad', function () {
    return view('cad'); // Esta view já está criada
});



//ordens
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('ordens', [OrdemController::class, 'index'])->name('ordens.index');
    Route::get('ordens/relatorio', [OrdemController::class, 'relatorio'])->name('ordens.relatorio');
    Route::get('ordens/relatorio/{mes}/{ano}', [OrdemController::class, 'atualizarRelatorioMensal']);
    Route::get('ordens/relatorio-anual', [OrdemController::class, 'relatorioAnual'])->name('ordens.relatorio.anual');
    Route::get('ordens/criar', [OrdemController::class, 'create'])->name('ordens.create');
    Route::post('ordens', [OrdemController::class, 'store'])->name('ordens.store');
    Route::get('ordens/{ordem}', [OrdemController::class, 'show'])->name('ordens.show');
    Route::get('ordens/{ordem}/editar', [OrdemController::class, 'edit'])->name('ordens.edit');
    Route::put('ordens/{ordem}', [OrdemController::class, 'update'])->name('ordens.update');
    Route::delete('ordens/{ordem}', [OrdemController::class, 'destroy'])->name('ordens.destroy');
   

});


Route::get('/index', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';

