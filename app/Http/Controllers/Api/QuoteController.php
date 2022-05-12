<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Quote;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Requests\QuoteRequest;
use App\Http\Controllers\Controller;

class QuoteController extends Controller
{    public function get()
    {
        return response()->json(['data' => Quote::with('categories')->get()],200);
    }

    public function add(QuoteRequest $request)
    {
        $request->validated();

        $data = request()->all();
        $newQuote = new Quote($data);
        $newQuote->save();

        if(!empty($data['categories']))
            $newQuote->categories()->attach($data['categories']);

        return response()->json($newQuote->load('categories'));
    }


    public function update(QuoteRequest $request, $quoteId)
    {
        $request->validate();

        $data = $request->json()->all();
        $quote = Quote::find($quoteId);
        $quote->update($data);

        if(!empty($data['categories']))
            $quote->categories()->attach($data['categories']);

        return response()->json($quote->load('categories'));
    }


    public function delete($quoteId)
    {
        $quote = Quote::find($quoteId);
        $result = $quote->delete();

        if($result)
            return ["result"=>"succes"];
        else
            return ["result"=>"fail"];
    }
}
