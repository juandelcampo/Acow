<?php

namespace App\Http\Controllers\Api;

use App\Models\Quote;
use App\Http\Requests\QuoteRequest;
use App\Http\Requests\CategoryRequest;
use App\Http\Controllers\Controller;
use DetectLanguage\DetectLanguage;
use App\Interfaces\TranslationRepositoryInterface;


class QuoteController extends Controller
{
    public $libreTranslateRepository;
    public $googleTranslateRepository;

   public function __construct(TranslationRepositoryInterface $libreTranslateRepository, $googleTranslateRepository)
   {
       $this->libreTranslateRepository = $libreTranslateRepository;
       $this->googleTranslateRepository = $googleTranslateRepository;
   }

   public function translation($quote, $language)
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
        $quote->author_id = $request->get('author_id');
        $quote->quote = $request->get('quote');
        $quote->publish_date = $request->get('publish_date');
        $quote->save();

        return response()->json($quote->load('categories'));
    }


    public function delete($quoteId)
    {
        $quote = Quote::find($quoteId);
        $result = $quote->delete();

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
        DetectLanguage::setApiKey("843ad80f5ee915b20f2af004df1aa8e0");
        $language = DetectLanguage::detect("$quote");


        return ['quote' => $quote->quote, 'author' => $quote->author->author, 'language' => $language[0]->language];
    }
}
