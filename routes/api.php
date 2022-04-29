<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\DateController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('authors', [AuthorController::class, 'getAllAuthors']);
Route::post('authors', [AuthorController::class, 'addNewAuthor']);
Route::post('authors/{authorId}', [AuthorController::class, 'updateAuthors']);
Route::delete('authors/{authorId}', [AuthorController::class, 'deleteAuthor']);

Route::get('quotes', [QuoteController::class, 'getAllQuotes']);
Route::post('quotes', [QuoteController::class, 'addNewQuote']);
Route::post('quotes/{quoteId}', [QuoteController::class, 'updateQuote']);
Route::delete('quotes/{quoteId}', [QuoteController::class, 'deleteQuote']);

Route::get('categories', [CategoryController::class, 'getAllCategories']);
Route::post('categories', [CategoryController::class, 'addNewCategory']);
Route::post('categories/{categoryId}', [CategoryController::class, 'updateCategory']);
Route::delete('categories/{categoryId}', [CategoryController::class, 'deleteCategory']);




/*
Route::get('quotes', [QuoteController::class, 'getQuotesWithAuthors']); //return quote with author
Route::get('quotes/{numberOfQuotes}', [QuoteController::class, 'getAnAmountOfQuotes']); // get an specified amount of quotes
Route::get('dates', [DateController::class, 'getDates']);
Route::get('authors', [AuthorController::class, 'getAllAuthors']); //get the entire list of authors
Route::get('authors/{authorId}', [AuthorController::class, 'getAuthors']); //get author by ID
Route::get('completequotes/{categoryId}', [QuoteController::class, 'getAllQuotesInformation']); //get quotes with author and category data
Route::get('quotes', [QuoteController::class, 'getQuotes']);
*/
