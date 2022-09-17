<?php

namespace App\Http\Controllers\Api;

use App\Models\Quote;
use App\Models\User;
use App\Http\Requests\QuoteRequest;
use App\Http\Requests\CategoryRequest;
use App\Http\Controllers\Controller;
use App\Services\DetectLanguageService;
use App\Interfaces\TranslationRepositoryInterface;
use Illuminate\Http\JsonResponse;
use App\Jobs\Heartbeat;



// Code Review
// Validar que las rutas funcionen con SAD and Happy paths

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

    public function get():JsonResponse
    {
        return response()->json(['data' => Quote::with('categories')->get()], 200);
    }

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

    //--------PUBLIC--------//

    public function today():JsonResponse
    {
        $date = date('Y-m-d H:i:s');
        $todayDate = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('m-d');
        $quote = Quote::where('publish_date', $todayDate)->with('author')->get()->first();
        $language = DetectLanguageService::detectLanguage($quote);

        return response()->json(['quote' => $quote->quote,
                                 'author' => $quote->author->author,
                                 'language' => $language[0]->language]);
    }

    public function random():JsonResponse
    {
        $quote = Quote::all()->random()->with('author')->get()->random();

        return response()->json(['quote' => $quote->quote,
        'author' => $quote->author->author]);
    }

    public function custom($apiKey){


        $apiKey = User::where('api_key', $apiKey);




    }

}

