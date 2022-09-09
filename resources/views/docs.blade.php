@include('layouts.html-head')
<body class="overflow">
    <main>
        @include('layouts.header-site')
        @include('layouts.logo')
        <section>
            <main id="main-doc" >
            <section class="main-section" id="Introduction">
                <header class="pt-8">0. Introduction</header>
                <article>
                    <p class="pb-3">The Quotes API is an easy to use data feed for your website or app. Developers love integrating API's into their projects.
                        <br>Some common use cases include start pages, Discord bots, mental health apps, and IoT devices.</p>
                    <p class="pb-3">It is our goal to provide a quality, reliable API for artists that both inspires and provokes thought. Our collection of quotes are specially curated looking for artists seeking for inspiration.  In this guide we will go over each available call option and best practices for development. Please note that you may need an API key and active subscription to get a response from some options.
                    </p>
                </article>
            </section>
        </section>
        <section class="main-section" id="Introduction">
            <header class="pt-8">1. Basic API Structure</header>
                <article>
                        <p class="pb-3">Quotes API calls are designed to be easy to use and understand. The result data is formatted as a JSON array.</p>
                        <p class="pb-3"><strong>The basic elements of an API call are as follows:</strong></p>
                    <div class="editor">
                        <code>
                            <span class="val">http://websiteurl/api<span class="arg">/[mode]</span><span class="keyword">/[key]</span>
                        </code>
                    </div>
                </article>
                <article>
                    <p class="pt-6 pb-3"><strong>where:</strong></p>
                    <div class="editor">
                    <code>
                        <span class="val">https://sitenameurl.com/api<span class="var"> = Quotes API URL. </span><span class="req">Required.</span><br>
                        <span class="arg">[mode]<span class="var"> = Retrieval type [quotes, today, author, random].  </span><span class="req">Required.</span><br>
                        <span class="keyword">[key]<span class="var"> = API key for use with subscription. </span><span class="str">Optional.</span>
                    </code>
                    </div>
                </article>
        </section>
        <section class="main-section" id="Introduction">
            <header class="pt-8">2. Response</header>
                <article>
                    <p class="pb-3">The resulting API data is formatted as a JSON array.</p>
                    <div class="editor">
                        <code>
                            <span class="var">{</span><br>
                            <span class="req padding-left">"quote"</span><span class="var">:</span><span class="arg">"Creativity is a natural extension of our enthusiasm."</span><span class="var">,</span><br>
                            <span class="req padding-left">"author"</span><span class="var">:</span><span class="arg">"Earl Nightingale"</span><br>
                            <span class="var">}</span>
                        </code>
                    </div>
                </article>
        </section>
        <section class="main-section" id="Introduction">
            <header class="pt-8">3. How to Fetch Quotes for your Website or App</header>
            <article>
                <p class="pb-3">This is the most efficient way for developers to load random quotes.
                                Use the standard <code class="code">[random]</code> API call and store the results as a variable in your project.
                </p>
                <p class="pb-3"><strong>Javascript Code Example</strong></p>
                <div class="editor">
                    <code>
                        <span class="var">
                        <br>
                        &lt;script type="text/javascript"><br>
                        const api_url ="https://websiteurl.com/api/quotes/random";<br>
                        async function getapi(url) <br>
                        {<br>
                            <code class="padding-left"> const response = await fetch(url);<br></code>
                            <code class="padding-left">var data = await response.json();<br></code>
                            <code class="padding-left"> console.log(data);<br></code>
                        } <br>
                        getapi(api_url); <br>
                        &lt;/script> <br>
                        <br>
                        </span>
                    </code>
                </div>
                <p class="pb-3 pt-6"><strong>PHP Code Example</strong></p>
                <div class="editor">
                    <code>
                        <span class="var">
                        <br>
                        &lt;?php<br>
                        $curl = curl_init();<br>
                        async function getapi(url) <br>
                        curl_setopt($curl, CURLOPT_URL,"https://websiteurl.com/api/quotes/random");<br>
                        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);<br>
                        $output = curl_exec($curl);<br>
                        curl_close($curl);<br>
                        ?> <br>
                        <br>
                        </span>
                    </code>
                </div>
            </article>
        </section>
        <section class="main-section" id="Introduction">
            <header class="pt-8">4. Get a quote for daily inspiration</header>
            <article>
                <p class="pb-3">Each day we feature a single quote from our database, which you can call using the <code class="code">[today]</code> call.
                                <p class="pb-3">To reduce server load, this response should be loaded into your app cache and refreshed daily rather
                                than making a call each time you want to display the quote in your project.
                                New quote is generated at midnight server time <code class="code">(00:00 CST)</code>.</p>
                <div class="editor">
                    <code>
                        <span class="val">http://websiteurl/api<span class="arg">/quote</span><span class="keyword">/today</span>
                    </code>
                </div>
            </article>
            </section>
            <section class="main-section" id="Introduction">
            <header class="pt-8">5. Pull a single inspirational quote</header>
            <article>
                <p class="pb-3">This is the most simple Quotes API request and will generate a single, random quote on each call.<br>
                <p class="pb-3">You may find the <code class="code">[random]</code> call useful for generating a random quote of the day
                                for your project rather than using the standard <code class="code">[today]</code> call to set yourself apart from others.
                                This call is also good for students first learning how to use the API.</p>
                <div class="editor">
                <code>
                    <span class="val">http://websiteurl/api<span class="arg">/quote</span><span class="keyword">/random</span>
                </code>
                </div>
            </article>
            </section>

            <section class="main-section" id="Introduction">
            <header class="pt-8">6. API Usage Limits and Attribution</header>
                <article>
                    <p class="pb-3">Requests are restricted by IP to 5 per 30 second period by default. An API key or registered IP is required for unlimited access and to enable Access-Control-Allow-Origin headers. We require that you show attribution with a link back to https://sitenameurl.com/ when using the free version of this API.</p>
                        <div class="editor">
                            <code>
                                <span class="str">Inspirational quotes provided by <span class="keyword">&lt;a href="http://websiteurl.com/" target="_blank"></span>Quotes API</a></span>
                            </code>
                        </div>
                </article>
            <footer>
                <br>
                <br>
                <br>
            </footer>
            </section>
    </main>
</body>
