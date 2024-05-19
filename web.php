<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentController;

Route::get('/', [DocumentController::class, 'index']);
Route::get('/documents/{filename}', [DocumentController::class, 'show'])->where('filename', '.*');
