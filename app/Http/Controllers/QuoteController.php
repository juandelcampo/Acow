<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quote;
use Illuminate\Database\Eloquent\Builder;

class QuoteController extends Controller
{    public function get()
    {
        return response()->json(['data' => Quote::with('categories')->get()],200);
    }

    public function add()
    {
        $data = request()->all();
        $newQuote = new Quote($data);
        $newQuote->save();

        if(!empty($data['categories']))
            $newQuote->categories()->attach($data['categories']);

        return response()->json($newQuote->load('categories'));
    }


    public function update(Request $request, $quoteId)
    {
        $data = $request->json()->all();
        $quote = Quote::find($quoteId);
        $quote->update($data);

        if(!empty($data['categories']))
            $quote->categories()->attach($data['categories']);

        return response()->json($quote->load('categories'));
       /* $quote = Quote::find($quoteId);
        $quote->quote = $request->quote;
        $quote->author_id = $request->author_id;
        $quote->publish_date = $request->publish_date;
        $quote->save();
        return response()->json($quote);*/
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
