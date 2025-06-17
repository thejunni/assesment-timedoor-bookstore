<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\RatingController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [BookController::class, 'index'])->name('books.index');
Route::get('/top-authors', [AuthorController::class, 'top'])->name('authors.top');
Route::get('/rate', [RatingController::class, 'create'])->name('rate.create');
Route::post('/rate', [RatingController::class, 'store'])->name('rate.store');

Route::get('/getBooks/{author_id}', [RatingController::class, 'getBooks']);