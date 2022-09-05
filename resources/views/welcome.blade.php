<!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome1"/>
        <meta name="viewport" content="width=device-width, initial-scale=1,
        maximum-scale=1, user-scalable=0">
        <title>IQAA</title>

        <link rel="stylesheet" href="{{ asset('css/background-gradient.css') }}">
        <link rel="stylesheet" href="{{ asset('css/landing-page.css') }}">
        <link rel="stylesheet" href="{{ asset('css/letter.css') }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <script src="{{ asset('js/background-gradient.js') }}" defer></script>
        <script src="{{ asset('js/letter.js') }}" defer></script>

        <script type="text/javascript" src="/js/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Unica+One&display=swap');
            </style>
</head>

<body>
    <main>
        <canvas></canvas>
        <header class="nav-menu">

            <ul id="menu-topo" class= "pt-8">
                <li class="nav-item"><a href="#">Submit a Quote</a></li>
                <li >•</li>
                <li class="nav-item"><a href="https://juanylosdelcampo.bandcamp.com/" target="_blank">About</a></li>
                <li >•</li>
                <li class="nav-item"><a href="{{ __('docs') }}">API</a></li>
                <li >•</li>
                <li class="nav-item"><a href="{{ __('/list-of-authors') }}">List of Authors</a></li>
            </ul>

          </header>



            <div style="max-width: 100%" class="relative ">

        <section >
            <div class="  flex  py-5 items-center content-center justify-center ">
                <div>
                    <a href="{{ __('/') }}"><img  src="images/logo.png"  alt="Logo ACOW"  width = '200' heigth = '200' class="center py-5"></a>
                        <div>

                            <div class="max-w-5xl">
                                <p id="quote" class=' letter-quote'></p>
                                <p id='author' class='letter-author pt-8 '></p>
                            </div>
                        </div>
                </div>
            </div>
        </section>
    </main>





    <script language='javascript'>
        function getQuote()
        {
        $.ajax({
            type: 'GET',  // Envío con método GET
                url: 'http://127.0.0.1:8000/api/quotes/randomquote',  // Fichero destino (el PHP que trata los datos)
            })
            .done(
                function( api )
                {
                    let author = api.author;
                    let quote = api.quote;

                    $( "#quote" ).html( quote );
                    $( "#author" ).html( author );
                }
            )
            .fail(
                function (jqXHR, textStatus, errorThrown)
                {
                    $("#consola").html("The following error occured: "+ textStatus +" "+ errorThrown);
                }
            );
        }
        getQuote();
        setInterval( () => getQuote(), 10000);
    </script>
</body>

