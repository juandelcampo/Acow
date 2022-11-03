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
// Le cambiaria el nombre al metodo ya que los mismos suelen ser acciones
public function translate(string $quote, string $language):string // Tipar el input y el output
{
    return $this->libreTranslateRepository->translate($quote, $language);
public function __construct(TranslationRepositoryInterface $libreTranslateRepository, $googleTranslateRepository)
{
    $this->libreTranslateRepository = $libreTranslateRepository;
    $this->googleTranslateRepository = $googleTranslateRepository;
}
}*/


   //----PUBLIC----//

    public function random():JsonResponse
    {
        $quote = Quote::where('user_id', '=', 1)
                        ->with('author')
                        ->get()
                        ->random();

        return response()->json(['quote' => $quote->quote,
                                'author' => $quote->author->author,
                                'lifetime' => $quote->author->lifetime,
                                'characters' => $quote->char_count]);
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
                                'author' => $quote->author->author,
                                'lifetime' => $quote->author->lifetime,
                                'characters' => $quote->char_count]);
    }


    public function getQuoteByAuthor(string $tag): JsonResponse
    {
        $quotes = Quote::where('user_id', '=', 1)
                        ->with('author')
                        ->whereHas('author', function($q) use ($tag) {$q
                        ->where('tag', $tag);})
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


    public function getQuoteByCategory(string $category): JsonResponse
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


    //----CUSTOM-----//


    public function customQuotes(string $apiKey):JsonResponse
    {
        $users = User::where('api_key', $apiKey)
                        ->select('id')
                        ->get();

        foreach ($users as $user){
            $id = $user->id;
        }

        $quotes = Quote::where('user_id', $id)
                        ->with('author')
                        ->with('categories')
                        ->get();

        foreach ($quotes as $quote){
            $collect[]=[
                'quote' => $quote->quote,
                'author' => $quote->author->author,
                'lifetime' => $quote->author->lifetime,
                'characters' => $quote->char_count
            ];
        }

            return response()->json($collect,200);
    }


    public function customRandom(string $apiKey):JsonResponse
    {
        /*
        $user = User::getByKey($apiKey);
        $quote = Quote::getRandomByUser($user);

        return response()->json($quote, 200);


        $user = User::getByKey($apiKey);
        return response()->json(Quote::getTodayQuote($user),200);
        */




        $user = User::where('api_key', $apiKey)
                        ->select('id')
                        ->first();

        //foreach ($users as $user){
            //$id = $user->id;
        //}

        $quotes = Quote::where('user_id', $user->id)
                        ->with('user')
                        ->with('author')
                        ->get();

        foreach ($quotes as $quote){
            $collect[]=[
                'quote' => $quote->quote,
                'author' => $quote->author->author,
                'lifetime' => $quote->author->lifetime,
                'characters' => $quote->char_count
            ];
        }

        $randomizer = array_rand($collect);
        $randomQuote = $collect[$randomizer];

        return response()->json($randomQuote,200);
    }


    public function customToday(string $apiKey):JsonResponse
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
                'lifetime' => $quote->author->lifetime,
                'characters' => $quote->char_count
            ];
        }

        return response()->json($collect,200);
    }


    public function getCustomQuoteByAuthor(string $tag, string $apiKey): JsonResponse
    {
        $users = User::where('api_key', $apiKey)
                    ->select('id')
                    ->get();

        foreach ($users as $user){
            $id = $user->id;
        }

        $quotes = Quote::where('user_id', '=', $id)
                        ->with('author')
                        ->whereHas('author', function($q) use ($tag) {$q
                        ->where('tag', $tag);})
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


    //---PROTECTED---//


    public function add(QuoteRequest $request):JsonResponse
    {
        $request->validateStructure();
        $data = request()->all();
        $quote = new Quote($data);
        $quote->save();
        $quote->categories()->attach($data['categories']);

        return response()->json($quote->load('categories'));
    }


    public function update(QuoteRequest $request, CategoryRequest $categoryRequest, int $quoteId):JsonResponse
    {
        $request->validateStructure();
        $quote = Quote::find($quoteId);
        $quote->categories()->sync($categoryRequest->get('categories'));
        $quote->fill([
                    'quote' => $request->get('quote'),
                    'author_id' => $request->get('author_id'),
                    'publish_date' => $request->get('publish_date'),
        ]);

        $quote->save();

        return response()->json($quote->load('categories'));
    }


    public function delete(int $quoteId):JsonResponse
    {
        $quote = Quote::findOrFail($quoteId);
        $result = $quote->delete();

        return response()->json(($result) ? 'success' : "fail");
    }


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
}

