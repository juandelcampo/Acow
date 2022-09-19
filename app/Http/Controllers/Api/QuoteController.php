<?php

namespace App\Http\Controllers\Api;

use App\Models\Quote;
use App\Models\User;
use App\Models\Category;
use App\Http\Requests\QuoteRequest;
use App\Http\Requests\CategoryRequest;
use App\Http\Controllers\Controller;
use App\Services\DetectLanguageService;
use App\Interfaces\TranslationRepositoryInterface;
use Illuminate\Http\JsonResponse;


class QuoteController extends Controller
{
   /* public $libreTranslateRepository;
    public $googleTranslateRepository;

   public function __construct(TranslationRepositoryInterface $libreTranslateRepository, $googleTranslateRepository)
   {
       $this->libreTranslateRepository = $libreTranslateRepository;
       $this->googleTranslateRepository = $googleTranslateRepository;
   }

   // Le cambiaria el nombre al metodo ya que los mismos suelen ser acciones
   public function translate(string $quote, string $language):string // Tipar el input y el output
   {
        return $this->libreTranslateRepository->translate($quote, $language);
   }*/

   //----PUBLIC----//

    public function get():JsonResponse
    {
        $quotes = Quote::where('user_id', '=', 1)
                        ->with('author')
                        ->inRandomOrder()
                        ->paginate(10);

        foreach ($quotes as $quote)
        {
            $collect[] = [
                        'quote' => $quote->quote,
                        'author' => $quote->author->author,
                        'lifetime' => $quote->author->lifetime,
                        'characters' => $quote->char_count
                        ];
        }

        return response()->json($collect,200);
    }

    public function getQuoteByAuthor($tag)
    {
        $quotes = Quote::where('user_id', '=', 1)
                        ->with('author')
                        ->whereHas('author', function($q) use ($tag) {
                        $q->where('tag', $tag);
                        })
                        ->get();

        foreach ($quotes as $quote)
        {
            $collect[] = [
                        'quote' => $quote->quote,
                        'author' => $quote->author->author,
                        'lifetime' => $quote->author->lifetime,
                        'characters' => $quote->char_count
                        ];

        }

        return response()->json($collect,200);
    }

    public function getQuoteByCategory($category)
    {
        $category = Category::where('user_id', '=', 1)
                                ->where('category', $category)
                                ->with('quotes')
                                ->with('quotes.author')
                                ->first();

        foreach ($category->quotes as $quote)
        {
            $collect[] = [
                        'quote' => $quote->quote,
                        'author' => $quote->author->author,
                        'lifetime' => $quote->author->lifetime,
                        'characters' => $quote->char_count
                        ];
        }

        return response()->json($collect,200);
    }

    public function today():JsonResponse
    {
        $date = date('Y-m-d H:i:s');

        $todayDate = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)
                                    ->format('m-d');

        $quote = Quote::where('user_id', '=', 1)
                        ->where('publish_date', $todayDate)
                        ->with('author')
                        ->get()
                        ->first();

        return response()->json(['quote' => $quote->quote,
                                 'author' => $quote->author->author]);
    }

    public function random():JsonResponse
    {
        $quote = Quote::where('user_id', '=', 1)
                        ->with('author')
                        ->get()
                        ->random();

        return response()->json(['quote' => $quote->quote,
                                'author' => $quote->author->author]);
    }

    //----CUSTOM-----//

    public function customQuotes($apiKey, $paginate):JsonResponse
    {
        $users = User::where('api_key', $apiKey)
                        ->select('id')
                        ->get();

        foreach ($users as $user){
            $id = $user->id;
        }

        $quotes = Quote::where('user_id', $id)
                        ->with('user')
                        ->with('author')
                        ->paginate($paginate);

        foreach ($quotes as $quote){
            $collect[]=[
                'quote' => $quote->quote,
                'author' => $quote->author->author,
                'characters' => $quote->tag
            ];
        }
            return response()->json($collect,200);
    }

    public function customRandom($apiKey):JsonResponse
    {
        $users = User::where('api_key', $apiKey)
                        ->select('id')
                        ->get();

        foreach ($users as $user){
            $id = $user->id;
        }

        $quotes = Quote::where('user_id', $id)
                        ->with('user')
                        ->with('author')
                        ->get();

        foreach ($quotes as $quote){
            $collect[]=[
                'quote' => $quote->quote,
                'author' => $quote->author->author,
            ];
        }

        $randomizer = array_rand($collect);
        $randomQuote = $collect[$randomizer];

        return response()->json($randomQuote,200);
    }

    public function customToday($apiKey):JsonResponse
    {
        $date = date('Y-m-d H:i:s');

        $todayDate = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)
                                    ->format('m-d');

        $users = User::where('api_key', $apiKey)
                        ->select('id')
                        ->get();

        foreach ($users as $user){
                $id = $user->id;
            }

        $quotes = Quote::where('publish_date', $todayDate)
                        ->where('user_id', $id)
                        ->with('author')
                        ->get();

        foreach ($quotes as $quote){
            $collect[]=[
                'quote' => $quote->quote,
                'author' => $quote->author->author,
            ];
        }

        return response()->json($collect,200);

}

    //----UPDATES-----//

    public function add(QuoteRequest $request):JsonResponse
    {
        $request->validateStructure();
        $data = request()->all();
        $newQuote = new Quote($data);
        $newQuote->save();
        $newQuote->categories()->attach($data['categories']);

        return response()->json($newQuote->load('categories'));
    }

    public function update(QuoteRequest $request, CategoryRequest $categoryRequest, int $quoteId):JsonResponse
    {
        $request->validateStructure();
        $quote = Quote::find($quoteId);
        $quote->categories()->sync($categoryRequest->get('categories'));
        $quote->fill([
            'quote' => $request->get('quote'),
            'author_id' => $request->get('author_id'),
            'publish_date' => $request->get('publish_date'),]);

        $quote->save();

        return response()->json($quote->load('categories'));
    }

    public function delete(int $quoteId):JsonResponse
    {
        $quote = Quote::findOrFail($quoteId);
        $result = $quote->delete();

        return response()->json(($result) ? 'success' : "fail");
    }


}

