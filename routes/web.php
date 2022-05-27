<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\QuoteController;
use App\Http\Controllers\Web\AuthorController;
use App\Http\Controllers\Web\CategoryController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get ('/', function (){
    return view('welcome');
});
Route::get('/dashboard', function (){
    return view('dashboard');
})->middleware(['auth'])->name ('dashboard');

require __DIR__.'/auth.php';

Route::get('authors', [AuthorController::class, 'index'])->name('authors.index');
Route::get('authors/create', [AuthorController::class, 'create'])->name('authors.create');
Route::post('authors/store', [AuthorController::class, 'store'])->name('authors.store');
Route::get('authors/edit/{authorId}', [AuthorController::class, 'edit'])->name('authors.edit');
Route::post('authors/update/{authorId}', [AuthorController::class, 'update'])->name('authors.update');
Route::get('authors/delete/{authorId}', [AuthorController::class, 'delete'])->name('authors.delete');


Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('categories/store', [CategoryController::class, 'store'])->name('categories.store');
Route::get('categories/edit/{categoryId}', [CategoryController::class, 'edit'])->name('categories.edit');
Route::post('categories/update/{categoryId}', [CategoryController::class, 'update'])->name('categories.update');
Route::get('categories/delete/{categoryId}', [CategoryController::class, 'delete'])->name('categories.delete');

Route::get('quotes', [QuoteController::class, 'index'])->name('quotes.index');
Route::get('quotes/create', [QuoteController::class, 'create'])->name('quotes.create');
Route::post('quotes/store', [QuoteController::class, 'store'])->name('quotes.store');
Route::get('quotes/edit/{quoteId}', [QuoteController::class, 'edit'])->name('quotes.edit');
Route::post('quotes/update/{quoteId}', [QuoteController::class, 'update'])->name('quotes.update');
Route::get('quotes/delete/{quoteId}', [QuoteController::class, 'delete'])->name('quotes.delete');
Route::get('dictionary', [QuoteController::class, 'api']);









