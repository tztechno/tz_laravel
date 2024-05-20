<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentController;

Route::get('/', [DocumentController::class, 'index'])->name('documents.index');
Route::get('/documents/{filename}', [DocumentController::class, 'show'])->name('documents.show');
