<?php

namespace App\Http\Controllers\Web;

use App\Models\Quote;
use App\Models\Category;
use App\Models\Author;
use App\Http\Requests\QuoteRequest;
use App\Http\Requests\CategoryRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

class QuoteController extends Controller
{

    public function index()
    {
        $quotes = Quote::with('categories')->paginate(30);
        return view('quotes-index', ['quotes' => $quotes]);
    }

    public function create()
    {
        $quotes = Quote::all();
        $categories = Category::orderBy('category', 'asc')->get();
        $authors = Author::orderBy('author', 'asc')->get();

        return view('quotes-add', ['quotes' => $quotes, 'categories' => $categories, 'authors' => $authors]);
    }

    public function store(QuoteRequest $request, CategoryRequest $categoryRequest)
    {
        $request->validateStructure();
        $quote = new Quote($request->all());
        $quote->save();
        $quote->categories()->attach($categoryRequest['categories']);

        return redirect()->route('quotes.index')->with('success', 'Quote Created successfully.');
    }

    public function edit($quoteId)
    {
        $quote = Quote::find($quoteId);
        $categories = Category::all();
        $authors = Author::all();
        $selected = [];

        foreach ($categories as $category) {
            $selected[] = [
                'category'  => $category->category,
                'id'        => $category->id,
                'selected'  => $quote->categories()->get()->contains(function ($value, $key) use ($category) {

                    return $value->id == $category->id;

                })
            ];
        }
        return view('quotes-edit', ['quote' => $quote, 'categories' => $selected, 'authors' => $authors]);

    }

    public function update($quoteId, QuoteRequest $request, CategoryRequest $categoryRequest)
    {

        $request->validateStructure();
        $quote = Quote::find($quoteId);
        $quote->categories()->sync($categoryRequest->get('categories'));
        $quote->author_id = $request->get('author_id');
        $quote->quote = $request->get('quote');
        $quote->publish_date = $request->get('publish_date');
        $quote->save();

        return redirect('/quotes')->with('success', 'Quote updated successfully.');
    }

    public function delete($quoteId, QuoteRequest $request, CategoryRequest $categoryRequest)
    {
        $quote = Quote::find($quoteId);
        $quote->categories()->sync($categoryRequest->get('categories'));
        $quote->author_id = $request->get('author_id');
        $quote->delete();

        return redirect()->route('quotes.index')->with('success', 'Quote deleted successfully.');
    }

    public function api()
    {
        $advices = Http::acceptJson()->get('https://api.adviceslip.com/advice');

        return view("dictionary", [
            'advices' => json_decode($advices)
        ]);
    }


}
