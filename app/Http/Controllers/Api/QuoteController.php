<?php

namespace App\Http\Controllers\Api;

use App\Models\Quote;
use App\Http\Requests\QuoteRequest;
use App\Http\Requests\CategoryRequest;
use App\Http\Controllers\Controller;
use DetectLanguage\DetectLanguage;
use App\Services\TraductorUno;

class QuoteController extends Controller
{
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


    public function delete($quoteId, QuoteRequest $request, CategoryRequest $categoryRequest)
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




        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://yandextranslatezakutynskyv1.p.rapidapi.com/translate",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "text=%3CREQUIRED%3E&lang=%3CREQUIRED%3E&apiKey=%3CREQUIRED%3E",
            CURLOPT_HTTPHEADER => [
                "X-RapidAPI-Host: YandexTranslatezakutynskyV1.p.rapidapi.com",
                "X-RapidAPI-Key: c8eadeb2a7mshda1e559ab3e4592p175d30jsn813c18750cbe",
                "content-type: application/x-www-form-urlencoded"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        }
        $responseData = json_decode($response);






        return ['quote' => $quote->quote, 'author' => $quote->author->author, 'language' => $language[0]->language, 'translation' => $responseData->message];
    }
}
