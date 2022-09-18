<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\QuoteController;
use App\Http\Controllers\Api\AuthorController;
use App\Http\Controllers\Api\CategoryController;

//Protected Routes
Route::group(['middleware'=>['auth:sanctum']], function(){

});

Route::prefix('quote')->group(function(){
    Route::post('/', [QuoteController::class, 'add']);
    Route::post('{quoteId}', [QuoteController::class, 'update']);
    Route::delete('{quoteId}',[QuoteController::class, 'delete']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

});

//Public Routes
Route::prefix('authors')->group(function(){
    Route::get('/', [AuthorController::class, 'get']);
    Route::get('/{apiKey}', [AuthorController::class, 'customAuthors']);
    Route::post('/', [AuthorController::class, 'add']);
    Route::post('{authorId}', [AuthorController::class, 'update']);
    Route::delete('{authorId}', [AuthorController::class, 'delete']);
});

Route::prefix('quote')->group(function(){
    Route::get('/', [QuoteController::class, 'get']);
    Route::get('today', [QuoteController::class, 'today']);
    Route::get('random', [QuoteController::class, 'random']);
    Route::get('/{apiKey}', [QuoteController::class, 'customQuotes']);
});

Route::prefix('categories')->group(function(){
    Route::get('/', [CategoryController::class, 'get']);
    Route::post('/', [CategoryController::class, 'add']);
    Route::post('{categoryId}', [CategoryController::class, 'update']);
    Route::delete('{categoryId}', [CategoryController::class, 'delete']);
});


