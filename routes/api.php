<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BooksController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'books'], function () {
    Route::get('/', [BooksController::class, 'index']);
    Route::post('/', [BooksController::class, 'create']);
    Route::get('/available', [BooksController::class, 'getAvailableBooks']);
    Route::post('/{id}/borrow', [BooksController::class, 'borrowBook']);
    Route::post('/{id}/return', [BooksController::class, 'returnBook']);
    Route::delete('/{id}', [BooksController::class, 'delete']);
});

Route::group(['prefix' => 'auth'], function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout']);
});