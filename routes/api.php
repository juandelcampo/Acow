<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\QuoteController;
use App\Http\Controllers\Api\AuthorController;
use App\Http\Controllers\Api\CategoryController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('authors', [AuthorController::class, 'get']);
Route::post('authors', [AuthorController::class, 'add']);
Route::post('authors/{authorId}', [AuthorController::class, 'update']);
Route::delete('authors/{authorId}', [AuthorController::class, 'delete']);

Route::get('quotes', [QuoteController::class, 'get']);
Route::post('quotes', [QuoteController::class, 'add']);
Route::post('quotes/{quoteId}', [QuoteController::class, 'update']);


Route::delete('quotes/{quoteId}',[QuoteController::class, 'delete']);

Route::get('quotes/todayquote', [QuoteController::class, 'today']);

Route::get('categories', [CategoryController::class, 'get']);
Route::post('categories', [CategoryController::class, 'add']);
Route::post('categories/{categoryId}', [CategoryController::class, 'update']);
Route::delete('categories/{categoryId}', [CategoryController::class, 'delete']);
