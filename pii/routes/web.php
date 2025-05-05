<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArquivoController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/enviararquivo', [ArquivoController::class, 'create'])->middleware(['auth','verified'])->name('enviararquivo');
Route::post('/arquivos', [ArquivoController::class, 'store'])->name('arquivos.store');

Route::get('arquivos/{id}/download', [ArquivoController::class, 'download'])->name('arquivos.download');

Route::get('arquivos/{id}/edit', [ArquivoController::class, 'edit'])->name('arquivos.edit');

Route::delete('arquivos/{id}', [ArquivoController::class, 'destroy'])->name('arquivos.destroy');


// Rota correta para listar arquivos (usando o controller)
Route::get('/listararquivo', [ArquivoController::class, 'index'])->middleware(['auth','verified'])->name('listararquivo');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';
