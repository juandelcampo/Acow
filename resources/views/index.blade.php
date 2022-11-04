
@include('layouts.html-head')
<body class="overflow">
    <main>
        <canvas></canvas>
        @include('layouts.header-site')
        <section >
            <div style="max-width: 100%" class="relative ">
                <div class="flex py-5 items-center content-center justify-center ">
                    <div>
                        <a href="{{ __('/') }}"><img src="images/logo.png" alt="Logo ACOW"  width='200' class="center py-5 btn-animate"></a>
                            <div>
                                <div class="max-w-5xl">
                                    <p id="quote" class='letter-quote'></p>
                                    <p id='author' class='letter-author pt-8 '>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script language='javascript'>
        function getQuote()
        {
        $.ajax({
            type: 'GET',
                url: "{{ asset('api/random') }}",
            })
            .done(
                function(api)
                {
                    let author = api.author;
                    let quote = api.quote;

                    $( "#quote" ).html( quote );
                    $( "#author" ).html( author );
                }
            )
            .fail(
                function (jqXHR, textStatus, errorThrown)
                {
                    $("#consola").html("The following error occured: "+ textStatus +" "+ errorThrown);
                }
            );
        }
        getQuote();
        setInterval( () => getQuote(), 10000);
    </script>
</body>

