<?php

namespace App\Services;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\TranslationRepositoryInterface;
use App\Repositories\GoogleTranslateRepository;


class TranslationServiceProvider extends ServiceProvider
{
        public function register()
   {
       $this->app->bind(TranslationRepositoryInterface::class, GoogleTranslateRepository::class);
       $this->app->bind(TranslationRepositoryInterface::class, LibreTranslateRepository::class);
   }

}


