<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class LibreTranslatorService implements TranslatorInterface
{
    public $language;

    public function translate(string $sourceLanguage, string $targetLanguage, string $quote): string
    {
        $data = ["body" =>
            [
            'q' => $quote,
            'source' => $sourceLanguage,
            'target' => $targetLanguage,
            'format' => 'text'
            ]
        ];
        
        $response = Http::
                        withHeaders(['Content-Type' => 'application/json'])
                        ->send('POST', 'https://libretranslate.de/translate', 
                            ['body' => json_encode($data['body'], 2)]
                        )->json();
        

        dd($response);
    
        return "texto traducido";
    }
}


/*
class Perro
{
    public $color;
    public $tamano;
    public $malo;

    function __construct(string $color, string $tamano, bool $malo){

        $this->color = $color;
        $this->tamano = $tamano;
        $this->malo = $malo;
    }

    function ladrar()
    {
        if($this->malo === true){
            return "guau";
        }else{
            return "shh..";
        }

    }

    function buscarPelota()
    {

    }
}

$sultan = new Perro('marron', 'grande', true);

$tuca = new Perro('amarillo', 'chico', false);

$sultan->ladrar();
*/