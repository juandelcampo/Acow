<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quote;
use Illuminate\Database\Eloquent\Builder;

class QuoteController extends Controller
{       public function getAllQuotes()
    {
            return response()->json(['data' => Quote::get()],200);

    }

    public function addNewQuote(Request $request)
    {
        $newQuote  = new Quote;
        $newQuote -> quote = request('quote');
        $newQuote -> author_id = request('author_id');
        $newQuote -> date_id = request('date_id');
        $newQuote -> save();
            return response()->json($newQuote);

    }


    public function updateQuote(Request $request, $quoteId)
    {
        $quote = Quote::find($quoteId);
        $quote->quote = $request->quote;
        $quote->author_id = $request->author_id;
        $quote->date_id = $request->date_id;
        $quote->save();
            return response()->json($quote);

    }


    public function deleteQuote($quoteId)
    {
        $quote = Quote::find($quoteId);
        $result = $quote->delete();

        if($result)
            return ["result"=>"succes"];

        else
            return ["result"=>"fail"];

    }
}


 //if($request->has('author_id') && $request->has('category_id'))
        //     $results = $results->where('author_id', $author_id)->whereHas('categories', function(Builder $query) use ($category_id){
        //      $query->where('category_id', $category_id);});





















    /*
    public function get(Request $request)
    {
        $author_id = $request->input('author_id');
        $category_id = $request->input('category_id');
        $result =  Quote::with('author')->with('categories')
                    ->where('author_id', $author_id)
                    ->whereHas('categories', function(Builder $query) use ($category_id){
                        $query->where('category_id', $category_id);
                    });


        if ( $request->has('author_id') && empty($category_id))

            return response()->json(['data' => Quote::with('author')->with('categories')
                    ->where('author_id', $author_id)->get() ],200);

        elseif ($request->has('category_id') && empty($author_id))

            return response()->json(['data' => Quote::with('categories')->with('author')
                    ->whereHas('categories', function(Builder $query) use ($category_id){
                    $query->where('category_id', $category_id);})->get() ],200);

        elseif ($request->has('category_id') && $request->has('author_id'))

            return response()->json(['data' => $result->get() ],200);

        else
            return response()->json(['data' => Quote::with('author')->with('categories')->get()],200);

    }

}
*/













/*class QuoteController extends Controller
{
    public function getQuotesWithAuthors(Request $request){

        return response()->json(['data' => Quote::with('author')->get()],200);

    }
    public function getAnAmountOfQuotes($numberOfQuotes){


        return response()->json(['data' => Quote::paginate($numberOfQuotes)],200);
    }

    public function getAllQuotesInformation($categoryId){


        $result = Quote::with('author')->with('categories')->whereHas('categories', function(Builder $query) use ($categoryId){
            $query->where('id', '=', $categoryId);
        });

        return response()->json(['data' => $result->get() ],200);
    }
}
*/

/*public function getQuotes(Request $request)
    {
        $author_id = $request->input('author_id');
        $category_id = $request->input('category_id');
        $results = Quote::with('author')->with('categories');

        if($request->has('category_id'))
             $results = $results->whereHas('categories', function(Builder $query) use ($category_id){
                        $query->where('category_id', $category_id);});

        if($request->has('author_id'))
             $results = $results->where('author_id', $author_id);

        return response()->json(['data' =>$results->get()],200);
    }
    */
