<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quote;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Requests\QuoteRequest;

class QuoteController extends Controller
{
    public function index()
    {
        $categories = Quote::paginate(15);
        return view('quotes-index', ['quotes' => $quotes]);
    }


    public function create()
    {
        return view('quotes-add');
    }


    public function store(QuoteRequest $request)
    {
        $request->validated();
        Quote::create($request->all());

        return redirect()->route('quotes.index')->with('success','Quote Created successfully.');
    }

    public function edit($quoteId)
    {
        $quote = Quote::find($quoteId);
        return view('quotes-edit', ['quote'=>$quote]);
    }

    public function update(QuoteRequest $request, Quote $quote)
    {
        $request->validated();
        $quote = Quote::find($request->id);
        $quote->quote = $request->quote;
        $quote->save();
        return redirect('/quotes')->with('success', 'Quote Updated successfully');
    }

    public function delete($quoteId)
    {
        $quote = Quote::find($quoteId);
        $quote->delete();

        return redirect()->route('quotes.index')->with('success', 'Quote Deleted successfully');
    }
}

