<?php

use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProdutoController::class, 'publicIndex'])->name('home');

Route::middleware(['auth', 'verified', 'catalog.manager'])->group(function (): void {
    Route::get('/dashboard', [ProdutoController::class, 'index'])->name('dashboard');
    Route::resource('produtos', ProdutoController::class)->except(['show']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});
