<?php

use App\Http\Controllers\DocumentationController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DocumentationController::class, 'index'])->name('documentation.index');
Route::get('/docs/{category}/{topic}', [DocumentationController::class, 'show'])->name('documentation.show');
Route::get('/search', [DocumentationController::class, 'search'])->name('documentation.search');
