<!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome1"/>
        <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=0">
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.png') }}">
        <title>API DOCS</title>
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Unica+One&display=swap">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Alumni+Sans+Pinstripe&family=Bebas+Neue&family=Comfortaa:wght@300&display=swap">
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script type="text/javascript" src="/js/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
</head>
<body class="overflow">
    @include('layouts.header-site')
        @include('layouts.logo')
            <section class="pt-8 margin-x ">
                <div  class="list-of-authors justify-center items-center content-center ">
                    <ul class="list-hori">
                        @foreach($authors as $author)
                        <a href="{{ __('author/').$author['id']}}"> <li class="list-hori" >{{$author['author']}}</li></a>
                        <li class="list-hori">•</li>
                        @endforeach
                    <ul>
                </div>
            </section>
</body>

