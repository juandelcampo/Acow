@include('layouts.html-head')
    <body class="overflow">
        <main>
            <header class="nav-menu">
                <ul id="menu-topo" class= "pt-8">
                    <li class="nav-item"><a class="font-header" href="{{('/create') }}">CREATE</a></li>
                    <li >•</li>
                    <li class="nav-item"><a class="font-header" href="{{('/about') }}">About</a></li>
                    <li >•</li>
                    <li class="nav-item"><a class="font-header" href="{{('/docs') }}">API</a></li>
                    <li >•</li>
                    <li class="nav-item"><a class="font-header" href="{{('/list-of-authors') }}">Authors</a></li>
                </ul>
            </header>
            <section >
                <div object-position: top class="pt-8 flex  items-center content-center justify-center ">
                    <div  style="absolute" >
                        <a href="{{ __('/') }}"><img  src="{{ URL::to('/images') }}/logo.png"  alt="Logo ACOW"  width ='100' class="center btn-animate-small"></a>
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
