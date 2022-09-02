<?php

 namespace app\Repositories\LibreTranslateRepository;
 use App\Interfaces\TranslationRepositoryInterface;
 use Illuminate\Support\Facades\Http;

 class LibreTranslatorRepository implements TranslationRepositoryInterface
 {
    public function translate(string $language, string $text): string
    {
        $data = ["body" =>
            [
            'q' => $text,
            'source' => 'en',
            'target' => $language,
            'format' => 'text'
            ]
        ];

        $response = Http::
                        withHeaders(['Content-Type' => 'application/json'])
                        ->send('POST', 'https://libretranslate.de/translate',
                            ['body' => json_encode($data['body'], 2)]
                        )->json();

        return $response;
    }
}



