<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\PublisherController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Public Routes
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);



// Admin-only Routes (middleware)
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/books', [BookController::class, 'store'])->middleware('is_admin');
    Route::post('/authors', [AuthorController::class, 'store'])->middleware('is_admin');
    Route::post('/publishers', [PublisherController::class, 'store'])->middleware('is_admin');
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/books', [BookController::class, 'index']);
    Route::get('/books/search', [BookController::class, 'search']);
    Route::get('/books/{id}', [BookController::class, 'show']);

    Route::get('/authors/search', [AuthorController::class, 'search']);
    Route::get('/authors/{id}/books', [AuthorController::class, 'showBooks']);

    Route::get('/publishers/search', [PublisherController::class, 'search']);
    Route::get('/publishers/{id}/books', [PublisherController::class, 'showBooks']);
});
