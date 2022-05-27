<?php

namespace App\Services;

class TraductorUno
{

    function translate(string $text, string $language): string
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://google-translate20.p.rapidapi.com/translate/languages?model=$text&target=$language",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "text=The%20POST%20method%20has%20several%20advantages%20over%20GET%3A%20it%20is%20more%20secure%20because%20most%20of%20the%20request%20is%20hidden%20from%20the%20user%3B%20Suitable%20for%20big%20data%20operations.&tl=es&sl=en",
            CURLOPT_HTTPHEADER => [
                "X-RapidAPI-Host: google-translate20.p.rapidapi.com",
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


        return $responseData;
    }

}
