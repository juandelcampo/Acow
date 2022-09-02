<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use DetectLanguage\DetectLanguage;

class DetectLanguageService
{
    static public function detectLanguage(string $text){

        $key = env('DETECT_LANGUAGE_API_KEY');
        DetectLanguage::setApiKey($key);
        $language = DetectLanguage::detect("$text");

        return $language;

    }
}














