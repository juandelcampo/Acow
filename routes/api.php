<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\QuoteController;
use App\Http\Controllers\Api\AuthorController;
use App\Http\Controllers\Api\CategoryController;

//Public Routes

//---PUBLIC AUTHORS---//
Route::get('authors', [AuthorController::class, 'get']);

//---PUBLIC CATEGORIES---//
Route::get('categories', [CategoryController::class, 'get']);

//---PUBLIC QUOTES---//
Route::get('random', [QuoteController::class, 'random']);
Route::get('today', [QuoteController::class, 'today']);
Route::get('quotes/categories/{category}', [QuoteController::class, 'getQuoteByCategory']);
Route::get('quotes/authors/{tag}', [QuoteController::class, 'getQuoteByAuthor']);


//Custom Routes

//---CUSTOM AUTHORS---//
Route::get('authors/{apiKey}', [AuthorController::class, 'customAuthors']);

//---CUSTOM QUOTES---//
Route::get('random/{apiKey}', [QuoteController::class, 'customRandom']);
Route::get('today/{apiKey}', [QuoteController::class, 'customToday']);
Route::get('quotes/{apiKey}', [QuoteController::class, 'customQuotes']);


//Protected Routes

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware'=>['auth:sanctum']], function(){


Route::prefix('quotes')->group(function(){
    Route::get('/', [QuoteController::class, 'get']);
    Route::post('/', [QuoteController::class, 'add']);
    Route::post('{quoteId}', [QuoteController::class, 'update']);
    Route::delete('{quoteId}',[QuoteController::class, 'delete']);
});

Route::prefix('authors')->group(function(){
    Route::post('/', [AuthorController::class, 'add']);
    Route::post('{authorId}', [AuthorController::class, 'update']);
    Route::delete('{authorId}', [AuthorController::class, 'delete']);
});

Route::prefix('categories')->group(function(){
    Route::post('/', [CategoryController::class, 'add']);
    Route::post('{categoryId}', [CategoryController::class, 'update']);
    Route::delete('{categoryId}', [CategoryController::class, 'delete']);
});

});


