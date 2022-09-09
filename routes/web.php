<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\QuoteController;
use App\Http\Controllers\Web\AuthorController;
use App\Http\Controllers\Web\CategoryController;
use App\Http\Controllers\Web\ApiDocsController;
use App\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;

Route::get ('/', function (){
    return view('welcome');
});

Route::get ('/docs', function (){
    return view('docs');
});

Route::get ('/create', function (){
    return view('create');
});

Route::get ('/about', function (){
    return view('about');
});

Route::get ('/list-of-authors', [AuthorController::class, 'listOfAuthors']);
Route::get('/author/{authorId}', [AuthorController::class, 'authorQuotes']);

Route::get('/dashboard', function (){
    $user = Auth::user()->name;
    return view('dashboard', ['user' => $user]);
    })->middleware(['auth'])->name ('dashboard');

require __DIR__.'/auth.php';

Route::prefix('authors')->group(function(){
//    dd('authors');
    Route::get('/', [AuthorController::class, 'index'])->name('authors.index');
    Route::get('create', [AuthorController::class, 'create'])->name('authors.create');
    Route::post('store', [AuthorController::class, 'store'])->name('authors.store');
    Route::get('edit/{authorId}', [AuthorController::class, 'edit'])->name('authors.edit');
    Route::post('update/{authorId}', [AuthorController::class, 'update'])->name('authors.update');
    Route::get('delete/{authorId}', [AuthorController::class, 'delete'])->name('authors.delete');
});

Route::prefix('categories')->group(function(){
    // dd('categories');
    Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('store', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('edit/{categoryId}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::post('update/{categoryId}', [CategoryController::class, 'update'])->name('categories.update');
    Route::get('delete/{categoryId}', [CategoryController::class, 'delete'])->name('categories.delete');
});

Route::prefix('quotes')->group(function(){

    Route::get('/', [QuoteController::class, 'index'])->name('quotes.index');
    Route::get('create', [QuoteController::class, 'create'])->name('quotes.create');
    Route::post('store', [QuoteController::class, 'store'])->name('quotes.store');
    Route::get('edit/{quoteId}', [QuoteController::class, 'edit'])->name('quotes.edit');
    Route::post('update/{quoteId}', [QuoteController::class, 'update'])->name('quotes.update');
    Route::get('delete/{quoteId}', [QuoteController::class, 'delete'])->name('quotes.delete');
});

Route::get('dictionary', [QuoteController::class, 'api']);










