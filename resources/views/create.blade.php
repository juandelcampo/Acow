<!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome1"/>
        <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=0">
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.png') }}">
        <title>About</title>
        <link rel="stylesheet" href="{{ asset('css/landing-page.css') }}">
        <link rel="stylesheet" href="{{ asset('css/letter.css') }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Unica+One&display=swap">
        <script src="{{ asset('js/docs.js') }}" defer></script>
        <script src="{{ asset('js/letter.js') }}" defer></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script type="text/javascript" src="/js/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
</head>
<body class="overflow">
    <main>
        <header class="nav-menu">
            <ul id="menu-topo" class= "pt-8">
                <li class="nav-item"><a href="{{ __('create') }}">CREATE</a></li>
                <li >•</li>
                <li class="nav-item"><a href="{{ __('about') }}">ABOUT</a></li>
                <li >•</li>
                <li class="nav-item"><a href="{{ __('docs') }}">API</a></li>
                <li >•</li>
                <li class="nav-item"><a href="{{ __('/list-of-authors') }}">AUTHORS</a></li>
            </ul>
        </header>
        <section >
            <div object-position: top class="pt-8 flex  items-center content-center justify-center ">
                <div  style="absolute" >
                    <a href="{{ __('/') }}"><img  src="images/logo.png"  alt="Logo ACOW"  width = '100' class="center"></a>
                </div>
            </div>
        </section>
        <div class="flex py-5 items-center content-center justify-center ">
            <div>
                <div class="max-w-5xl">
                    <p class=' letter-quote'>CREATE YOUR OWN COLLECTION</p>
                </div>
            </div>
            </div>
        <section>
            <main id="main-doc" >
            <section class="main-section">
                <header class="pt-8 flex items-center justify-center text-center">CREATE AN ACCOUNT AND LOAD YOUR OWN QUOTES</header>
                <article class="items-center margin-gross justify-center text-center">
                    <p class="pb-3  items-center justify-center">Premium subscribers have the ability to load up to <strong>366</strong> of their own custom quote entries and call them using their API key.
                        <br>Create an account and  enter each quote from the Admin Dashboard Panel chosing author, quote and category.</p>
                    <p class="pb-3 items-center justify-center"> To call your custom quotes, use a standard API call and append the option <code>&custom=true</code> to the end of the request.
                                     The API will now only filter for your custom quotes.</p>
                    <div class="editor">
                    <code>
                        <span class="val">http://websiteurl/api<span class="arg">/[mode]</span><span class="keyword">/[key]</span><span class="var">&custom=true</span>
                </div>
                <section>
                    <section class="pt-8 pb-20 ">
                        <a href="{{ __('/register') }}"><button type="submit" class="px-6 inline-flex items-center px-4 py-2 bg-gray-1000 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                            REGISTER
                        </button></a>
                        <a href="{{ __('/login') }}"><button type="submit" class="px-6 inline-flex items-center px-4 py-2 bg-gray-1000 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                            LOG IN
                        </button>
                    </section>
                </section>
            </article>
        </section>
</body>
