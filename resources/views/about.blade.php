<!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome1"/>
        <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=0">
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.png') }}">
        <title>About</title>
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Unica+One&display=swap">
        <script src="{{ asset('js/docs.js') }}" defer></script>
        <script src="{{ asset('js/letter.js') }}" defer></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script type="text/javascript" src="/js/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
</head>
<body class="overflow">
    @include('layouts.header-site')
        @include('layouts.logo')
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
