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
                    <p class="pb-6">The Quotes API is an easy to use data feed for your website or app. Developers love integrating API's into their projects.
                        <br>Some common use cases include start pages, Discord bots, mental health apps, and IoT devices.</p>
                    <p class="pb-6">It is our goal to provide a quality, reliable API for artists that both inspires and provokes thought. Our collection of quotes are specially curated looking for artists seeking for inspiration.  In this guide we will go over each available call option and best practices for development. Please note that you may need an API key and active subscription to get a response from some options.
                    </p>
                </article>
            </section>
        </section>
        <section class="main-section" id="Introduction">
            <header class="pt-8">1. Basic API Structure</header>
                <article>
                        <p class="pb-6">Quotes API calls are designed to be easy to use and understand. The result data is formatted as a JSON array.</p>
                        <p class="pb-6"><strong>The basic elements of an API call are as follows:</strong></p>
                    <div class="editor">
                        <code>
                            <span class="val">http://websiteurl/api<span class="arg">/[mode]</span><span class="func">/[filter]</span><span class="keyword">/[api_key]</span>
                        </code>
                    </div>
                </article>
                <article>
                    <p class="pt-6 pb-6"><strong>where:</strong></p>
                    <div class="editor">
                    <code>
                        <span class="val">https://sitenameurl.com/api<span class="var"> = Quotes API URL. </span><span class="req">Required.</span><br>
                        <span class="arg">[mode]<span class="var"> = Retrieval type [random, today, authors, categories].  </span><span class="req">Required.</span><br>
                        <span class="func">[filter]<span class="var"> = Filter type [author-name, category] </span><span class="str">Optional.</span><br>
                        <span class="keyword">[api_key]<span class="var"> = API key for custom quotes with subscription. </span><span class="str">Optional.</span>
                    </code>
                    </div>
                </article>
        </section>
        <section class="main-section" id="Introduction">
            <header class="pt-8">2. Response</header>
                <article>
                    <p class="pb-6">The resulting API data is formatted as a JSON array.</p>
                    <div class="editor">
                        <code>
                            <span class="var">{</span><br>
                            <span class="req padding-left">"quote"</span><span class="var">:</span><span class="arg">"Creativity is a natural extension of our enthusiasm."</span><span class="var">,</span><br>
                            <span class="req padding-left">"author"</span><span class="var">:</span><span class="arg">"Earl Nightingale"</span><br>
                            <span class="req padding-left">"characters"</span><span class="var">:</span><span class="val">52</span><br>
                            <span class="var">}</span>
                        </code>
                    </div>
                </article>
        </section>
        <section class="main-section" id="Introduction">
            <header class="pt-8">3. How to Fetch Quotes for your Website or App</header>
            <article>
                <p class="pb-6">This is the most efficient way for developers to load random quotes.
                                Use the standard <code class="code">[random]</code> API call and store the results as a variable in your project.
                </p>
                <p class="pb-6"><strong>Javascript Code Example</strong></p>
                <div class="editor">
                    <code>
                        <span class="var">
                        <br>
                        &lt;script type="text/javascript"><br>
                        const api_url ="https://websiteurl.com/api/random";<br>
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
                <p class="pb-6 pt-6"><strong>PHP Code Example</strong></p>
                <div class="editor">
                    <code>
                        <span class="var">
                        <br>
                        &lt;?php<br>
                        $curl = curl_init();<br>
                        async function getapi(url) <br>
                        curl_setopt($curl, CURLOPT_URL,"https://websiteurl.com/api/random");<br>
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
            <header class="pt-8">4. Pull a single, random quote</header>
            <article>
                <p class="pb-6">This is the most simple Quotes API request and will generate a single, random quote on each call.<br>
                <p class="pb-6">You may find the <code class="code">[random]</code> mode useful for generating a random quote on every refresh of after some time.
                                This call is also good for students first learning how to use the API.</p>
                <div class="editor">
                <code>
                    <span class="val">http://websiteurl.com/api<span class="keyword">/random</span>
                </code>
                </div>
            </article>
        </section>
        <section class="main-section" id="Introduction">
            <header class="pt-8">5. Follow the Calendar of Wisdom</header>
            <article>
                <p class="pb-6">Each day of the year, we feature a single quote from the Lev Tolstoi's book "The Calendar of Wisdom" which you can call using the <code class="code ">[today]</code> mode.
                                <p class="pb-6">To reduce server load, this response should be loaded into your app cache and refreshed daily rather
                                than making a call each time you want to display the quote in your project.
                                New quote is generated at midnight server time <code class="code">(00:00 CST)</code>.</p>
                <div class="editor">
                    <code>
                        <span class="val">http://websiteurl.com/api<span class="keyword">/today</span>
                    </code>
                </div>
            </article>
            </section>
            <section class="main-section" id="Introduction">
                <header class="pt-8">4. The list of categories</header>
                <article>
                    <p class="pb-6">Get a list of available categories to filter your queries.</p>
                    <div class="editor">
                        <code>
                            <span class="val">http://websiteurl/api<span class="keyword">/categories</span>
                        </code>
                    </div>
                </article>
            </section>
            <section class="main-section" id="Introduction">
                <header class="pt-8">6. Request quote by category</header>
                <article>
                    <p class="pb-6">To filter quotes by category, simply add the <code class="code">[category]</code> to the end of your request.
                    <div class="editor">
                        <code>
                            <span class="val">http://websiteurl/api<span class="keyword">/categories</span><span class="func">/[category]</span>
                        </code>
                    </div>
                </article>
            </section>
        <section class="main-section" id="Introduction">
            <header class="pt-8">7. The list of authors</header>
            <article>
                <p class="pb-6">The <code class="code">[authors]</code> mode generates a list of available authors with some data about them and a tag to filter your queries.
                <div class="editor">
                    <code>
                        <span class="val">http://websiteurl/api<span class="keyword">/authors</span>
                    </code>
                </div>
            </article>
        </section>
        <section class="main-section" id="Introduction">
            <header class="pt-8">8. Request Quotes from a Specific Author</header>
            <article>
                <p class="pb-6">The <code class="code">[authors]</code> mode in combination with the <code class="code">[author-name]</code> filter is used to generate a batch of quotes by a single author. We are adding more figures every month and are open to suggestions from our users. Please send your candidates to tututuca@charliehehe.com for consideration.
                <div class="editor">
                    <code>
                        <span class="val">http://websiteurl/api<span class="keyword">/authors</span><span class="var">/[author-name]</span>
                    </code>
                </div>
            </article>
        </section>
            <section class="main-section" id="Introduction">
                <header class="pt-8">9. CREATE AN ACCOUNT AND LOAD YOUR OWN QUOTES</header>
                <article>
                    <p class="pb-6">Premium subscribers have the ability to load up to 366 of their own custom quote entries and call them using their API key.
                        Create an account and enter each quote from the Admin Dashboard Panel chosing author, quote and category.

                        To call your custom quotes, use a standard API call and append the <code class="code">[api_key]</code> to the end of the request. The API will now only filter for your custom quotes.<br>
                    <div class="editor">
                    <code>
                        <span class="val ">http://websiteurl.com/api<span class="arg">/[mode]</span><span class="keyword">/[api_key]</span>
                    </code>
                    </div>
                </article>
                </section>
            <section class="main-section" id="Introduction">
            <header class="pt-8">10. API Usage Limits and Attribution</header>
                <article>
                    <p class="pb-6">Requests are restricted by IP to 5 per 30 second period by default. An API key or registered IP is required for unlimited access and to enable Access-Control-Allow-Origin headers. We require that you show attribution with a link back to https://sitenameurl.com/ when using the free version of this API.</p>
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
