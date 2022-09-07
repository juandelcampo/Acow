<!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome1"/>
        <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=0">
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.png') }}">
        <title>List of Authors</title>
        <link rel="stylesheet" href="{{ asset('css/landing-page.css') }}">
        <link rel="stylesheet" href="{{ asset('css/letter.css') }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="{{ asset('js/background-gradient.js') }}" defer></script>
        <script src="{{ asset('js/letter.js') }}" defer></script>
        <script type="text/javascript" src="/js/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <link  rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Unica+One&display=swap">
</head>
<body class="overflow">
    <main>
        <header class="nav-menu">
            <ul id="menu-topo" class= "pt-8">
                <li class="nav-item"><a href="#">Submit a Quote</a></li>
                <li >•</li>
                <li class="nav-item"><a href="{{('/about') }}">About</a></li>
                <li >•</li>
                <li class="nav-item"><a href="{{('/docs') }}">API</a></li>
                <li >•</li>
                <li class="nav-item"><a href="{{('/list-of-authors') }}">Authors</a></li>
            </ul>
        </header>
        <section >
            <div object-position: top class="pt-8 flex  items-center content-center justify-center ">
                <div  style="absolute" >
                    <a href="{{ __('/') }}"><img  src="{{ URL::to('/images') }}/logo.png"  alt="Logo ACOW"  width = '100' heigth = '100' class="center"></a>
                </div>
            </div>
        </section>
        <section class="pt-8 margin-x ">
            <div class="title-author justify-center items-center justify-center content-center ">
             <header >{{$author['author']}}</header>
            </div>
            <div id="list-of-authors">
                <ul>
                    @foreach($quotes as $quote)
                        <li>•</li>
                        <li>{{$quote['quote']}}</li>
                    @endforeach
                <ul>
                    <li class="list-hori">•</li>
            </div>
            <section>
                <div class="list-of-authors-mini justify-center items-center justify-center content-center ">
                    <ul class=" list-hori">
                        @foreach($authors as $author)
                        <a href="{{ ($author['id'])}}"> <li class="list-hori" >{{$author['author']}}</li></a>
                        <li class="list-hori">•</li>
                        @endforeach
                    <ul>
                </div>
                <br><br><br><br><br>
            </section>
    </main>
</body>
