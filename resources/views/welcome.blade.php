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
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Unica+One&display=swap">
        <script src="{{ asset('js/background-gradient.js') }}" defer></script>
        <script src="{{ asset('js/letter.js') }}" defer></script>
        <script type="text/javascript" src="/js/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
</head>
<body class="overflow">
    <main>
        <canvas></canvas>
        <header class="nav-menu">
            <ul id="menu-topo" class= "pt-8">
                <li class="nav-item"><a href="{{ __('create') }}">CREATE</a></li>
                <li >•</li>
                <li class="nav-item"><a href="{{ __('about') }}">About</a></li>
                <li >•</li>
                <li class="nav-item"><a href="{{ __('docs') }}">API</a></li>
                <li >•</li>
                <li class="nav-item"><a href="{{ __('/list-of-authors') }}">Authors</a></li>
            </ul>
        </header>
        <section >
            <div style="max-width: 100%" class="relative ">
                <div class="flex py-5 items-center content-center justify-center ">
                    <div>
                        <a href="{{ __('/') }}"><img src="images/logo.png" alt="Logo ACOW"  width = '200' class="center py-5 btn-animate "></a>
                            <div>
                                <div class="max-w-5xl">
                                    <p id="quote" class=' letter-quote'></p>
                                    <p id='author' class='letter-author pt-8 '></p>
                                </div>
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
            type: 'GET',
                url: 'http://127.0.0.1:8000/api/quotes/randomquote',
            })
            .done(
                function(api)
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

