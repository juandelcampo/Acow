@include('layouts.html-head')
    <body class="overflow">
        @include('layouts.header-site')
            @include('layouts.logo')
            <main id="main-doc">
            <section>
                <div class="flex py-5 items-center content-center justify-center ">
                    <div>
                        <div class="max-w-5xl">
                            <p class=' letter-quote'>CREATE YOUR OWN COLLECTION</p>
                        </div>
                    </div>
                </div>
            </section>
            <section class="main-section">
                <header class="pt-8 flex items-center justify-center text-center">CREATE AN ACCOUNT AND LOAD YOUR OWN QUOTES</header>
                    <article class="items-center margin-gross justify-center text-center">
                        <p class="pb-3  items-center justify-center">Premium subscribers have the ability to load up to <strong>366</strong> of their own custom quote entries and call them using their API key.
                            <br>Create an account and  enter each quote from the Admin Dashboard Panel chosing author, quote and category.</p>
                        <p class="pb-3 items-center justify-center"> To call your custom quotes, use a standard API call and append the option <code>&custom=true</code> to the end of the request.
                                        The API will now only filter for your custom quotes.</p>
                    </article>
            </section>
            <section class="editor center width-60x flex">
                    <div  >
                        <code class="text-center flex">
                            <span class="val ">http://websiteurl/api<span class="arg">/[mode]</span><span class="keyword">/[key]</span><span class="var">&custom=true</span>
                        </code>
                    </div>
            </section>
            <section class="pt-8 pb-20 text-center">
                        <a href="{{ __('/register') }}"><button type="submit" class="px-6 inline-flex items-center px-4 py-2 bg-gray-1000 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                            REGISTER
                            </button></a>
                        <a href="{{ __('/login') }}"><button type="submit" class="px-6 inline-flex items-center px-4 py-2 bg-gray-1000 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                            LOG IN
                            </button></a>
            </section>
    </body>
