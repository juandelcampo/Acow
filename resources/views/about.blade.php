<!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome1"/>
        <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=0">
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.png') }}">
        <title>About</title>
        <link rel="stylesheet" href="{{ asset('css/landing-page.css') }}">
        <link rel="stylesheet" href="{{ asset('css/letter.css') }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Unica+One&display=swap">
        <script src="{{ asset('js/docs.js') }}" defer></script>
        <script src="{{ asset('js/letter.js') }}" defer></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script type="text/javascript" src="/js/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
</head>
<body class="overflow">
    <main>
        <header class="nav-menu">
            <ul id="menu-topo" class= "pt-8">
                <li class="nav-item"><a href="#">CREATE</a></li>
                <li >•</li>
                <li class="nav-item"><a href="{{ __('about') }}">ABOUT</a></li>
                <li >•</li>
                <li class="nav-item"><a href="{{ __('docs') }}">API</a></li>
                <li >•</li>
                <li class="nav-item"><a href="{{ __('/list-of-authors') }}">AUTHORS</a></li>
            </ul>
        </header>
        <section >
            <div object-position: top class="pt-8 flex  items-center content-center justify-center ">
                <div  style="absolute" >
                    <a href="{{ __('/') }}"><img  src="images/logo.png"  alt="Logo ACOW"  width = '100' heigth = '100' class="center"></a>
                </div>
            </div>
        </section>
        <section>
            <div>
                <p class="pt-8 letter-quote-about justify-center items-center content-center pt-100 about-font">
                        curated by
                    <a href="https://juanylosdelcampo.bandcamp.com/" target="blank">
                        <span class="font-pink">Juan del Campo</span></a>
                        and
                    <a href="https://www.instagram.com/laszlo.estudio/" target="blank">
                        <span class="font-light-blue">Laszlo Studio</span></a>
                </p>
            </div>
        </section>
</body>
