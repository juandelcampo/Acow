<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.png') }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ACOW - A calendar of wisdom</title>

        <!-- Fonts and assests -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@1,500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('i.css') }}">
        <script src="i.js">
        <script type="text/javascript" src="/js/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    </head>

    <body  >
        <canvas></canvas>
    <script src="i.js">


    <div style="max-width: 100%" class="relative flex justify-center items-top  min-h-screen sm:pt-0 ">

        <div class=" left-0 left-0 px-6sm:block fixed top-0  px-6 py-4 text-gray-700 dark:text-gray-500  rounded-lg sm\:items-top shadow-lg     text-gray-800  ">
            <a href="https://juanylosdelcampo.bandcamp.com/" target="_blank"  class=" text-sm text-gray-700 dark:text-gray-500 py-4 ">Curated by Juan del Campo</a>

        </div>

        <div class="fixed top-0 right-0 px-6 py-4 text-gray-700 dark:text-gray-500  sm:block">


                <a href="{{ route('login') }}" class=" text-h5 text-gray-700">APIddd</a>

                    <a href="{{ route('register') }}" class="ml-4 text-h5 text-gray-700  ">Authors</a>

                    <a href="{{ route('register') }}" class="ml-4 text-h5 text-gray-700">Submit a Quote</a>


        </div>

{{-- IMAGE - QUOTE - AUTHOR --}}
                <div object-position: top class="min-w-screen min-h-screen flex sm\:items-center  items-center justify-center ">
                    <div  class="w-full  py-x rounded-lg sm\:items-top shadow-lg   text-gray-800" style="max-width: 100%">
                      {{--  <img src="images/logo.png"  alt="Logo ACOW"  width = '300' heigth = '300' class="center">--}}
                            <div>
                                <div  class="w-full ">
                                    <p id="quote" class=' m-0 pt-8 mt-2 text-xl  text-center'></p>
                                </div>
                                <div class="w-full top-0 grid justify-end">
                                    <p id='author' class='m-0 text-ok text-gray-700 '></p>
                                </div>
                            </div>
                    </div>
                </div>
    </div>




                <script language='javascript'>
                function getQuote()
                {
                $.ajax({
                    type: 'GET',  // Envío con método GET
                    url: 'http://127.0.0.1:8000/api/quotes/randomquote',  // Fichero destino (el PHP que trata los datos)
                })
                .done(
                    function( api )
                    {  // Función que se ejecuta si todo ha ido bien
                        let author = api.author;
                        let quote = api.quote;
                        $( "#quote" ).html( quote );
                        $( "#author" ).html( author );
                    }
                )
                .fail(
                    function (jqXHR, textStatus, errorThrown)
                    { // Función que se ejecuta si algo ha ido mal
                        // Mostramos en consola el mensaje con el error que se ha producido
                        $("#consola").html("The following error occured: "+ textStatus +" "+ errorThrown);
                    }
                );
                }
                getQuote();
                setInterval( () => getQuote(), 10000);
                </script>


</body>
</html>
