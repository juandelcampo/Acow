<?php

namespace App\Services;

interface TranslatorInterface
{
    public function translate(string $sourceLanguage, string $targetLanguage, string $quote): string;

}