<?php

use Illuminate\Support\Facades\Route;

// Import des contrôleurs
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\AiController;

// Page d'accueil (tableau de bord)
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// Routes pour les livres (CRUD : Create, Read, Update, Delete)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('books', BookController::class);
    Route::resource('loans', LoanController::class);

    // Routes spécifiques pour l'IA
    Route::post('/ai/summarize', [AiController::class, 'summarize'])->name('ai.summarize');
    Route::get('/ai/stock-analysis', [AiController::class, 'stockAnalysis'])->name('ai.stock-analysis');
});


// Routes pour les adhérents (partie publique)
Route::get('/catalog', [BookController::class, 'catalog'])->name('catalog.index');
Route::get('/catalog/search', [AiController::class, 'naturalSearch'])->name('catalog.search');