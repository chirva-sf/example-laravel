<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/index/{id?}', [BookController::class, 'index'])->name('index');
Route::match(['post', 'put'], '/store', [BookController::class, 'store'])->name('store-form');
Route::delete('/delete/{id?}', [BookController::class, 'delete'])->name('delete');

