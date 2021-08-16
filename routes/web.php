<?php

use App\Http\Controllers\ArticlesController;
use Illuminate\Support\Facades\Route;




// ****************************************************************************
Route::resource('articles', ArticlesController::class);

Route::get('/', [ArticlesController::class, 'index'])->name('root');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
