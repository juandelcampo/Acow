@include('layouts.html-head')
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

