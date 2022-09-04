<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.png') }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ACOW - A calendar of wisdom</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@1,500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style.css">



        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */


            html{line-height:1.15;-webkit-text-size-adjust:100%} body{margin:0}
            html{font-family: system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5},
            a{background-color:transparent}[hidden]{display:none}{font-family: 'Nunito', sans-serif}
            p{font-family: 'Lora', serif}
            :after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}
            svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}
            .bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}
            .bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}
            .border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}
            .border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}
            .items-center{align-items:center}
            .justify-center{justify-content:center}
            .justify-end{justify-items: end}
            .font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}
            .text-sm{font-size:.875rem}.text-ok{font-size:1.5rem}.text-xl{font-size:2rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}
            .mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}
            .mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}
            .mt-8{margin-top:2rem}.m-0{margin:0rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}
            .min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.p-7{padding:0.75rem}
            .py-4{padding-top:1rem;padding-bottom:1rem}.py-x{padding-bottom:11rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}
            .pt-8{padding-top:1rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.left-0{left:0}
            .shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}
            .text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}
            .text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}
            .text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}
            .text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}
            .text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}
            .text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}
            .text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}
            .underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}
            .w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}
            .center {display: flex;  margin-left: auto;  margin-right: auto;}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}
            .sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}
            .sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}
            .sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}

            body {
                background: linear-gradient(-45deg, #d6c8c5, #e9dbe0, #c1ced3, #c7d6d3);
                background-size: 400% 400%;
                animation: gradient 60s ease infinite;
                height: 100vh;
            }

            @keyframes gradient {
                0% {
                background-position: 0% 50%;
                }
                50% {
                background-position: 100% 50%;
                }
                100% {
                background-position: 0% 50%;
                }
            }


       </style>


        <script type="text/javascript" src="/js/jquery-3.6.0.min.js"></script>
    </head>


    <body >


                    <div style="max-width: 100%" class="relative flex justify-center items-top  min-h-screen bg-gray-100 dark:bg-gray-900   sm:pt-0 ">
                            <div class=" fixed top-0 left-0 px-6 py-3 sm:block">
                                <p>A calendar of Wisdom</p>
                            </div>


        {{-- IMAGE - QUOTE - AUTHOR --}}
                                    <div object-position: top class="min-w-screen min-h-screen flex sm\:items-center  items-center justify-center ">
                                        <div  class="w-full  py-x rounded-lg sm\:items-top shadow-lg   text-gray-800" style="max-width: 100%">
                                            <img src="images/logo.png"  alt="Logo ACOW"  width = '150' heigth = '150' class="center">
                                                <div>
                                                    <div  class="w-full ">
                                                        <p id="quote" class=' m-0 pt-8 mt-2 text-xl text-gray-900 text-center'></p>
                                                    </div>
                                                    <div class="w-full top-0 grid justify-end">
                                                        <p id='author' class='m-0 text-ok text-gray-700 '></p>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                        </div>
           {{--  /*
            $.ajax({
                type: 'GET',  // Envío con método GET
                url: 'http://127.0.0.1:8000/api/quotes/todayquote',  // Fichero destino (el PHP que trata los datos)
            }).done(
                function( api ) {  // Función que se ejecuta si todo ha ido bien
                    let author = api.author;
                    let quote = api.quote;
                    $( "#quote" ).append( "<p class=' m-0 pt-8 mt-2 text-xl text-gray-900 text-center '>"+quote+"</p>" );
                    $( "#author" ).append( "<p class='m-0 text-ok text-gray-700   sm\:text-right '>"+author+"</p>" );
                }
            ).fail(function (jqXHR, textStatus, errorThrown){ // Función que se ejecuta si algo ha ido mal
                // Mostramos en consola el mensaje con el error que se ha producido
                $("#consola").html("The following error occured: "+ textStatus +" "+ errorThrown);
            });*/--}}


            <script language='javascript'>
                function getQuote()
                {
                    $.ajax({
                        type: 'GET',  // Envío con método GET
                        url: 'http://127.0.0.1:8000/api/quotes/randomquote',  // Fichero destino (el PHP que trata los datos)
                    })
                    .done(
                        function( api )
                        {  // Función que se ejecuta si todo ha ido bien
                            let author = api.author;
                            let quote = api.quote;
                            $( "#quote" ).html( quote );
                            $( "#author" ).html( author );
                        }
                    )
                    .fail(
                        function (jqXHR, textStatus, errorThrown)
                        { // Función que se ejecuta si algo ha ido mal
                            // Mostramos en consola el mensaje con el error que se ha producido
                            $("#consola").html("The following error occured: "+ textStatus +" "+ errorThrown);
                        }
                    );
                }
                getQuote();
                setInterval( () => getQuote(), 10000);
            </script>

    </body>
</html>
