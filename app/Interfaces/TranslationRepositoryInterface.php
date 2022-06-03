<?php

namespace App\Interfaces;

interface TranslationRepositoryInterface
{
    public function translate(string $text, string $language): string;
}
