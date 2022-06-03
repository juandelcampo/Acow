<?php

namespace App\Http\Controllers\Api;

use App\Models\Quote;
use App\Http\Requests\QuoteRequest;
use App\Http\Requests\CategoryRequest;
use App\Http\Controllers\Controller;
use DetectLanguage\DetectLanguage;
use App\Interfaces\TranslationRepositoryInterface;


// Code Review
// Validar que las rutas funcionen con SAD and Happy paths

class QuoteController extends Controller
{
    public $libreTranslateRepository;
    public $googleTranslateRepository;

   public function __construct(TranslationRepositoryInterface $libreTranslateRepository, $googleTranslateRepository)
   {
       $this->libreTranslateRepository = $libreTranslateRepository;
       $this->googleTranslateRepository = $googleTranslateRepository;
   }

   // Le cambiaria el nombre al metodo ya que los mismos suelen ser acciones
   public function translation($quote, $language) // Tipar el input y el output
   {
        return $this->libreTranslateRepository->translate($quote, $language);
   }

    public function get()
    {
        return response()->json(['data' => Quote::with('categories')->get()], 200);
    }

    public function add(QuoteRequest $request)
    {
        $request->validated();
        $data = request()->all();
        $newQuote = new Quote($data);
        $newQuote->save();
        $newQuote->categories()->attach($data['categories']);

        return response()->json($newQuote->load('categories'));
    }


    public function update(QuoteRequest $request, CategoryRequest $categoryRequest, $quoteId) // DEBUGEAR
    {
        $request->validated();
        $quote = Quote::find($quoteId);
        $quote->categories()->sync($categoryRequest->get('categories'));

        // Intentar usar Mass Assignment https://laravel.com/docs/9.x/eloquent#mass-assignment
        // para la asignacion de propiedades
        $quote->author_id = $request->get('author_id');
        $quote->quote = $request->get('quote');
        $quote->publish_date = $request->get('publish_date');

        $quote->save();

        return response()->json($quote->load('categories'));
    }


    public function delete($quoteId)  // Tipar el input y el output
    {
        $quote = Quote::find($quoteId);
        $result = $quote->delete();

        // Usar un ternario para el if
        if ($result)
            return ["result" => "success"];
        else
            return ["result" => "fail"];
    }

    public function today()
    {

        $date = date('Y-m-d H:i:s');
        $todayDate = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)
            ->format('m-d');

        $quote = Quote::where('publish_date', $todayDate)->with('author')->get()->first();

        // Mover esta logica a LanguageService.php
        // que va a tener un metodo llamada getLanguage(string $text)
        // y va a devolver el lenguaje del texto de origen
        DetectLanguage::setApiKey("843ad80f5ee915b20f2af004df1aa8e0"); // Mover el api key al archivo de .env y .env.example
        $language = DetectLanguage::detect("$quote");


        return ['quote' => $quote->quote, 'author' => $quote->author->author, 'language' => $language[0]->language];
    }
}
