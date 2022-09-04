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


        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
            html{line-height:1.15;-webkit-text-size-adjust:100%} body{margin:0}
            html{font-family: system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5},
            a{background-color:transparent}[hidden]{display:none}{font-family: 'Nunito', sans-serif}
            h6{font-family: 'Lora', serif}
            p{font-family: 'Lora', serif}
            :after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}

            .bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}
            .bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}
            .border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}
            .border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}
            .items-center{align-items:center}
            .justify-center{justify-content:center}
            .justify-end{justify-items: end}
            .font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}
            .text-sm{font-size:.875rem}.text-ok{font-size:1.5rem}
            .text-xl{font-size:2rem}

            .text-xxxl{font-size:3rem}


            .text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}
            .mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}
            .mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}
            .mt-8{margin-top:2rem}.m-0{margin:0rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}
            .min-h-screen{min-height:100vh}.p-6{padding:1.5rem}.p-7{padding:0.75rem}
            .min-h-screen2{min-height:100vh}.p-6{padding:1.5rem}.p-7{padding:0.75rem}

            .py-4{padding-top:1rem;padding-bottom:1rem}
            .py-x{padding-bottom:11rem}
            .px-6{padding-left:1.5rem;padding-right:1.5rem}

            .pt-8{padding-top:1rem}

            .pt-100{padding-top:10rem}
            .py-w{padding-bottom:10rem}

            .fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.left-0{left:0}
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
            .overflow-y-scroll {overflow-y: scroll}
            .section-home-bg{background: url(/images.back.jpg) center center no-repeat}{background-size: cover}
            .min-h-max{max-height: -0.75rem}
            body{
                background-color: #ffffff;
                padding: 0px;
                margin: 0px;
                }

            #gradient{
                width: 100%;
                height: 100%;
                padding: 0px;
                margin: 0px;
                }
                html{
                    width: 100%;
                    height: 100%
                }
                canvas{
                    width: 100%;
                    height: 100%
                }

                .whitespace-pre-line{	white-space: pre-line }

                .margin-horizontal-10{margin-left: 150px; margin-right: 150px;}

        </style>
        <script type="text/javascript" src="/js/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    </head>

    <body class="antialiased">
        <main>
            <div
                class="relative pt-16 pb-32 flex content-center items-center justify-center"style="min-height: 75vh;">
                <div class="absolute top-0 w-full h-full bg-center bg-cover"style='background-image: url("https://images.unsplash.com/photo-1557804506-669a67965ba0?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=1267&amp;q=80");'>
                <span
                    id="blackOverlay"
                    class="w-full h-full absolute opacity-75 bg-black">
                </span>
                </div>
                    <div class="container relative mx-auto">
                        <div class="items-center  flex-wrap">
                            <div class="w-full lg:w-6/12 px-4 ml-auto mr-auto text-center">
                                <div class="pr-12">
                                    <div style="max-width: 100%" class=" justify-center items-top sm:pt-0 ">
                                        <div class=" fixed top-0 left-0 px-6 py-3 sm:block">
                                            <p>A calendar of Wisdom</p>
                                        </div>
                                    @if (Route::has('login'))
                                        <div class="fixed top-0 right-0 px-6 py-4 sm:block">
                                    @auth
                                            <a href="{{ url('/dashboard') }}" class=" text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                                    @else
                                            <a href="{{ route('login') }}" class=" text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
                                    @if (Route::has('register'))
                                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                                    @endif
                                @endauth
                                        </div>
                                    @endif
                    <section id="gradient">
                            <div object-position: top class="min-w-screen2 pt-100 flex sm\:items-center py-w  items-center justify-center ">
                                <div  class="" style="max-width: 100%">
                                    <img src="images/logo.png"  alt="Logo ACOW"  width = '300' heigth = '300' class="center">
                                        <div>
                                            <div  class="w-full ">
                                                <p id="quote" class=' m-0 pt-8 mt-2 text-xxxl text-gray-900 text-center'></p>
                                            </div>
                                            <div class="w-full top-0 grid justify-end">
                                                <p id='author' class='m-0 text-ok text-gray-700 '></p>
                                            </div>
                                        </div>
                                </div>
                            </div>
                    </section>
                    <section  class="p margin-horizontal-10" >
                        <div class="container mx-auto px-4">
                            <div class="flex  flex-wrap ">
                                <div class=" ">
                                     <h6 class="text-xl  ">Instant Inspiration</h6>
                                             <p class="">
                                                Divide details about your product or agency work into parts.
                                                A paragraph describing a feature will be enough.
                                            </p>
                                </div>

                      <div class="pt-6 w-full md:w-4/12 px-2 text-center">
                        <div
                          class="relative margin-horizontal-10 flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg"
                        >
                          <div class=" ">

                            <h6 class="text-xl ">Embed quotes in your sites</h6>
                            <p class="mt-2 mb-4 ">
                                ACOW API can be used free of charge but you may not use this service in a manner that exceeds reasonable request volume.
                                When no API key is provided, attribution is required and the number of requests per IP address is limited.


                            </p>
                          </div>
                        </div>
                      </div>


                      <div class="pt-6 w-full md:w-4/12 px-2 text-center">
                        <div
                          class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg">

                          <div class="px-4 py-5 flex-auto">
                            <div
                              class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full ">

                              <i class="fas fa-fingerprint"></i>
                            </div>
                            <h6 class="text-xl">Store your own quotes</h6>
                            <p class="mt-2 mb-4 ">
                              Write a few lines about each one. A paragraph describing a
                              feature will be enough. Keep you user engaged!
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="flex flex-wrap items-center mt-32">
                      <div class="w-full md:w-5/12 px-4 mr-auto ml-auto">
                        <div
                          class="p-3 text-center inline-flex items-center justify-center w-16 h-16 mb-6 shadow-lg rounded-full bg-gray-100"
                        >
                          <i class="fas fa-user-friends text-xl"></i>
                        </div>


                      </div>
                      <div class="w-full md:w-4/12 px-4 mr-auto ml-auto">
                        <div
                          class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded-lg bg-pink-600">


                        </div>
                      </div>
                    </div>
                  </div>
                </section>
                <section class="relative py-20">
                  <div
                    class="bottom-auto top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20"
                    style="height: 80px; transform: translateZ(0px);"
                  >
                    <svg
                      class="absolute bottom-0 overflow-hidden"
                      xmlns="http://www.w3.org/2000/svg"
                      preserveAspectRatio="none"
                      version="1.1"
                      viewBox="0 0 2560 100"
                      x="0"
                      y="0"
                    >
                      <polygon
                        class="text-white fill-current"
                        points="2560 0 2560 100 0 100"
                      ></polygon>
                    </svg>
                  </div>
                  <div class="container mx-auto px-4">
                    <div class="items-center flex flex-wrap">
                      <div class="w-full md:w-4/12 ml-auto mr-auto px-4">
                        <img
                          alt="..."
                          class="max-w-full rounded-lg shadow-lg"
                          src="./assets/img/section2.jpeg"
                        />
                      </div>
                      <div class="w-full md:w-5/12 ml-auto mr-auto px-4">
                        <div class="md:pr-12">
                          <div
                            class="text-pink-600 p-3 text-center inline-flex items-center justify-center w-16 h-16 mb-6 shadow-lg rounded-full bg-pink-300"
                          >
                            <i class="fas fa-rocket text-xl"></i>
                          </div>
                          <h3 class="text-3xl font-semibold">A growing company</h3>
                          <p class="mt-4 text-lg leading-relaxed text-gray-600">
                            The extension comes with three pre-built pages to help you get
                            started faster. You can change the text and images and you're
                            good to go.
                          </p>
                          <ul class="list-none mt-6">
                            <li class="py-2">
                              <div class="flex items-center">
                                <div>
                                  <span
                                    class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-pink-600 bg-pink-200 mr-3"
                                    ><i class="fas fa-fingerprint"></i
                                  ></span>
                                </div>
                                <div>
                                  <h4 class="text-gray-600">
                                    Carefully crafted components
                                  </h4>
                                </div>
                              </div>
                            </li>
                            <li class="py-2">
                              <div class="flex items-center">
                                <div>
                                  <span
                                    class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-pink-600 bg-pink-200 mr-3"
                                    ><i class="fab fa-html5"></i
                                  ></span>
                                </div>
                                <div>
                                  <h4 class="text-gray-600">Amazing page examples</h4>
                                </div>
                              </div>
                            </li>
                            <li class="py-2">
                              <div class="flex items-center">
                                <div>
                                  <span
                                    class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-pink-600 bg-pink-200 mr-3"
                                    ><i class="far fa-paper-plane"></i
                                  ></span>
                                </div>
                                <div>
                                  <h4 class="text-gray-600">Dynamic components</h4>
                                </div>
                              </div>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>

                <section class="pb-20 relative block bg-gray-900">
                  <div
                    class="bottom-auto top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20"
                    style="height: 80px; transform: translateZ(0px);"
                  >
                    <svg
                      class="absolute bottom-0 overflow-hidden"
                      xmlns="http://www.w3.org/2000/svg"
                      preserveAspectRatio="none"
                      version="1.1"
                      viewBox="0 0 2560 100"
                      x="0"
                      y="0"
                    >
                      <polygon
                        class="text-gray-900 fill-current"
                        points="2560 0 2560 100 0 100"
                      ></polygon>
                    </svg>
                  </div>
                  <div class="container mx-auto px-4 lg:pt-24 lg:pb-64">
                    <div class="flex flex-wrap text-center justify-center">
                      <div class="w-full lg:w-6/12 px-4">
                        <h2 class="text-4xl font-semibold text-white">Build something</h2>
                        <p class="text-lg leading-relaxed mt-4 mb-4 text-gray-500">
                          Put the potentially record low maximum sea ice extent tihs year
                          down to low ice. According to the National Oceanic and
                          Atmospheric Administration, Ted, Scambos.
                        </p>
                      </div>
                    </div>
                    <div class="flex flex-wrap mt-12 justify-center">
                      <div class="w-full lg:w-3/12 px-4 text-center">
                        <div
                          class="text-gray-900 p-3 w-12 h-12 shadow-lg rounded-full bg-white inline-flex items-center justify-center"
                        >
                          <i class="fas fa-medal text-xl"></i>
                        </div>
                        <h6 class="text-xl mt-5 font-semibold text-white">
                          Excelent Services
                        </h6>
                        <p class="mt-2 mb-4 text-gray-500">
                          Some quick example text to build on the card title and make up
                          the bulk of the card's content.
                        </p>
                      </div>
                      <div class="w-full lg:w-3/12 px-4 text-center">
                        <div
                          class="text-gray-900 p-3 w-12 h-12 shadow-lg rounded-full bg-white inline-flex items-center justify-center"
                        >
                          <i class="fas fa-poll text-xl"></i>
                        </div>
                        <h5 class="text-xl mt-5 font-semibold text-white">
                          Grow your market
                        </h5>
                        <p class="mt-2 mb-4 text-gray-500">
                          Some quick example text to build on the card title and make up
                          the bulk of the card's content.
                        </p>
                      </div>
                      <div class="w-full lg:w-3/12 px-4 text-center">
                        <div
                          class="text-gray-900 p-3 w-12 h-12 shadow-lg rounded-full bg-white inline-flex items-center justify-center"
                        >
                          <i class="fas fa-lightbulb text-xl"></i>
                        </div>
                        <h5 class="text-xl mt-5 font-semibold text-white">Launch time</h5>
                        <p class="mt-2 mb-4 text-gray-500">
                          Some quick example text to build on the card title and make up
                          the bulk of the card's content.
                        </p>
                      </div>
                    </div>
                  </div>
                </section>
              </main>



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
<script language='javascript'>
var colors = new Array(
  [62,35,255],
  [60,255,60],
  [255,35,98],
  [45,175,230],
  [255,0,255],
  [255,128,0]);

var step = 0;
//color table indices for:
// current color left
// next color left
// current color right
// next color right
var colorIndices = [0,1,2,3];

//transition speed
var gradientSpeed = 0.002;

function updateGradient()
{

  if ( $===undefined ) return;

var c0_0 = colors[colorIndices[0]];
var c0_1 = colors[colorIndices[1]];
var c1_0 = colors[colorIndices[2]];
var c1_1 = colors[colorIndices[3]];

var istep = 1 - step;
var r1 = Math.round(istep * c0_0[0] + step * c0_1[0]);
var g1 = Math.round(istep * c0_0[1] + step * c0_1[1]);
var b1 = Math.round(istep * c0_0[2] + step * c0_1[2]);
var color1 = "rgb("+r1+","+g1+","+b1+")";

var r2 = Math.round(istep * c1_0[0] + step * c1_1[0]);
var g2 = Math.round(istep * c1_0[1] + step * c1_1[1]);
var b2 = Math.round(istep * c1_0[2] + step * c1_1[2]);
var color2 = "rgb("+r2+","+g2+","+b2+")";

 $('#gradient').css({
   background: "-webkit-gradient(linear, left top, right top, from("+color1+"), to("+color2+"))"}).css({
    background: "-moz-linear-gradient(left, "+color1+" 0%, "+color2+" 100%)"});

  step += gradientSpeed;
  if ( step >= 1 )
  {
    step %= 1;
    colorIndices[0] = colorIndices[1];
    colorIndices[2] = colorIndices[3];

    //pick two new target color indices
    //do not pick the same as the current one
    colorIndices[1] = ( colorIndices[1] + Math.floor( 1 + Math.random() * (colors.length - 1))) % colors.length;
    colorIndices[3] = ( colorIndices[3] + Math.floor( 1 + Math.random() * (colors.length - 1))) % colors.length;

  }
}

setInterval(updateGradient,10);
</script>




    </body>
</html>
