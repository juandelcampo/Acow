<!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome1"/>
        <meta name="viewport" content="width=device-width, initial-scale=1,
        maximum-scale=1, user-scalable=0">
        <title>List of Authors</title>


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

<body class="overflow">
    <main>

        <header class="nav-menu">
            <ul id="menu-topo" class= "pt-8">
                <li class="nav-item"><a href="#">Submit a Quote</a></li>
                <li >•</li>
                <li class="nav-item"><a href="https://juanylosdelcampo.bandcamp.com/" target="_blank">About</a></li>
                <li >•</li>
                <li class="nav-item"><a href="{{ __('/docs') }}">API</a></li>
                <li >•</li>
                <li class="nav-item"><a href="{{ __('/') }}">Home</a></li>
            </ul>
        </header>
        <section >
            <div object-position: top class="pt-8 flex  items-center content-center justify-center ">
                <div  style="absolute" >
                    <a href="{{ __('/') }}"><img  src="images/logo.png"  alt="Logo ACOW"  width = '100' heigth = '100' class="center"></a>
        </section>
        <section class="pt-8 margin-x ">

            <div class="list-of-authors justify-center items-center justify-center content-center ">

                    <ul class=" list-hori ">
                        @foreach($authors as $author)
                        <li class="list-hori" >{{$author['author']}} </li>
                        <li class="list-hori">•</li>
                        @endforeach
                    <ul>

                    </div>




    </main>
</body>
