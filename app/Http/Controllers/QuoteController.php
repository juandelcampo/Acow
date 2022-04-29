<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quote;
use Illuminate\Database\Eloquent\Builder;

class QuoteController extends Controller
{    public function get()
    {
        return response()->json(['data' => Quote::get()],200);
    }

    public function add(Request $request)
    {
        $newQuote = new Quote;
        $newQuote->quote = request('quote');
        $newQuote->author_id = request('author_id');
        $newQuote->publish_date = request('publish_date');
        $newQuote->save();
        return response()->json($newQuote);
    }


    public function update(Request $request, $quoteId)
    {
        $quote = Quote::find($quoteId);
        $quote->quote = $request->quote;
        $quote->author_id = $request->author_id;
        $quote->publish_date = $request->publish_date;
        $quote->save();
        return response()->json($quote);
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
