<?php

namespace App\Http\Controllers\Web;

use App\Models\Quote;
use App\Models\Category;
use App\Models\Author;
use App\Http\Requests\QuoteRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class QuoteController extends Controller
{

    public function index()
    {
        if ((Auth::user()->is_permission) == 1)
        {
            $quotes = Quote::with('categories')
                            ->orderBy('publish_date', 'asc')
                            ->paginate(30);
        } else {
            $user = Auth::user()->id;
            $quotes = Quote::where('user_id', '=', $user)
                            ->with('categories')
                            ->orderBy('publish_date', 'asc')
                            ->paginate(30);
        }
        return view('quotes-index', ['quotes' => $quotes]);
    }

    public function create()
    {
        if ((Auth::user()->is_permission) == 1)
        {
            $quotes = Quote::all();
            $categories = Category::orderBy('category', 'asc')->get();
            $authors = Author::orderBy('author', 'asc')->get();
        } else {
            $user = Auth::user()->id;
            $quotes = Quote::where('user_id', '=', $user);
            $categories = Category::where('user_id', '=', $user)->orderBy('category', 'asc')->get();
            $authors = Author::where('user_id', '=', $user)->orderBy('author', 'asc')->get();
        }

        return view('quotes-add', ['quotes' => $quotes, 'categories' => $categories, 'authors' => $authors]);
    }

    public function store(QuoteRequest $request)
    {
        $request->validateStructure();
        $quote = new Quote($request->all());
        $quote->user_id = Auth::user()->id;
        $quote->save();
        $quote->categories()->attach($request->input('categories'));

        return redirect()->route('quotes.index')->with('success', 'Quote Created successfully.');
    }

    public function edit($quoteId)
    {
        if ((Auth::user()->is_permission) == 1)
        {
            $quote = Quote::find($quoteId);
            $categories = Category::all();
            $authors = Author::all();
        } else {
            $user = Auth::user()->id;
            $quote = Quote::where('user_id', '=', $user)->find($quoteId);
            $categories = Category::where('user_id', '=', $user)->get();
            $authors = Author::where('user_id', '=', $user)->get();
        }
        $selected = [];

        foreach ($categories as $category)
        {
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

    public function update($quoteId, QuoteRequest $request){

        $request->validateStructure();
        $quote = Quote::find($quoteId);
        $quote->categories()->sync($request->input('categories'));
        $quote->author_id = $request->get('author_id');
        $quote->quote = $request->get('quote');
        $quote->publish_date = $request->get('publish_date');
        $quote->save();

        return redirect('/quotes')->with('success', 'Quote updated successfully.');
    }

    public function delete($quoteId, QuoteRequest $request)
    {
        $quote = Quote::find($quoteId);
        $quote->categories()->sync($request->input('categories'));
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
