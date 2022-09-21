@include('layouts.html-head')
<body class="overflow">
    @include('layouts.header-site')
        @include('layouts.logo')
            <section class="pt-8 margin-x ">
                <div  class="list-of-authors justify-center items-center content-center ">
                    <ul class="list-hori">
                        @foreach($categories as $category)
                        <li class="list-hori" >{{$category['category']}}</li>
                            @if (!$loop->last)
                                <li class="list-hori">•</li>
                            @endif
                        @endforeach
                    <ul>
                </div>
            </section>
</body>
