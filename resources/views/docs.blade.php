<!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome1"/>
        <meta name="viewport" content="width=device-width, initial-scale=1,
        maximum-scale=1, user-scalable=0">
        <title>API DOCS</title>


        <link rel="stylesheet" href="{{ asset('css/landing-page.css') }}">
        <link rel="stylesheet" href="{{ asset('css/letter.css') }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <script src="{{ asset('js/background-gradient.js') }}" defer></script>
        <script src="{{ asset('js/letter.js') }}" defer></script>
        <script src="{{ asset('js/app.js') }}" defer></script>

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
                <li class="nav-item"><a href="{{ __('/') }}">Home</a></li>
                <li >•</li>
                <li class="nav-item"><a href="{{ __('/list-of-authors') }}">List of Authors</a></li>
            </ul>
        </header>
        <section >
            <div class="pt-8 flex  items-center content-center items-center  justify-center ">
                <div  style="absolute" >
                    <a href="{{ __('/') }}"><img  src="images/logo.png"  alt='Logo ACOW'  width = '100' heigth = '100' class="center"></a>
        </section>
        <section >
                <div id="doc-text" class="left-0 ">
                    <p>The Quotes API is an incredibly easy to use data feed for your website or app. Developers love integrating our service into their projects.
                        Some common use cases include: start pages, Discord bots, mental health apps, and IoT devices.
                        See Project Examples It is our goal to provide a quality, reliable API that both inspires and provokes thought.
                        Our collection of quotes are specially curated by the development team and are never auto-scraped from the internet like you will
                        find with most other low quality API providers. In this guide we will go over each available call option and best practices
                        for development. Please note that you may need an API key and active subscription to get a response from some options, see the Use
                        Limits section for more information.</p>

                    </p>


    </main>
</body>

