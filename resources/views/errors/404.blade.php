@include('layouts.html-head')
    <body class="overflow">
        @include('layouts.header-site')
        <section >
            <div class="pt-8 flex  items-center content-center items-center  justify-center ">
                <div  style="absolute" >
                    <a href="{{ __('/') }}"><img src="{{ URL::to('/images') }}/logo.png"  alt='Logo ACOW'  width='100' class="btn-animate-small center"></a>
                </div>
            </div>
        </section>

            <main id="main-doc">
            <section>
                <div class="flex py-5 items-center content-center justify-center ">
                    <div>
                        <div class="max-w-5xl">
                            <p class='letter-quote'>404</p>
                        </div>
                    </div>
                </div>
            </section>
            <section class="">
                <header class="pt-8 flex items-center justify-center text-center letter-author">page not found</header>
                <header class="pt-8 flex items-center justify-center text-center letter-author">•</header>
            </section>
            <section>
                <div class=>
                    <ul >
                        <li>•</li>
                    <ul>
                </div>
            </section>
            <section>
                    <div class="list-of-authors-mini justify-center items-center justify-center content-center">
                        <ul class="list-hori">
                            <li>Not all those who wander are lost.</li>
                            <li style="font-size: 1.5rem; right:0ch">J.R.R.TOLKIEN</li>
                        <ul>
                    </div>
            </section>
    </body>
