<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentController;

Route::get('/', [DocumentController::class, 'index']);
Route::get('/documents/{document}', [DocumentController::class, 'show'])->name('document.show');
