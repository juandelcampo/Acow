@include('layouts.html-head')
<body class="scroll">
    <main>
        @include('layouts.header-site')
        @include('layouts.logo')

            <main id="main-doc" >
                <section class="main-section" id="introduction">
                    <header class="pt-8">Introduction</header>
                    <article>
                        <p class="pb-3">The <i>Quotes API</i> is a <strong>free, open source</strong> quotations API easy to use.
                            <br>Some common use cases include start pages, bots, mental health apps, and IoT devices.</p>
                        <p class="pb-3">It is our goal to provide a quality, reliable API that both inspires and provokes thought.
                            Our collection of quotes are specially curated looking for artists seeking for inspiration or facing a creative block.
                            <br>In this guide we will go over each available call option and best practices for development.
                           <br>Please note that you may need an API key and active subscription to get a response from some options.
                        </p>
                    </article>
                </section>

                <section class="main-section">
                    <header class="pt-8" id="index">Index</header>

                        <ul class="index" >
                            <li class="underline-on-hover"><a href="#structure">1. Basic API Structure</a></li>
                            <li class="underline-on-hover"><a href="#fetch">2. How to Fetch Quotes for your Website or App</a></li>
                            <li class="underline-on-hover"><a href="#response">3. Response</a></li>
                            <li class="underline-on-hover"><a href="#random">4. Pull a Single, Random Quote</a></li>
                            <li class="underline-on-hover"><a href="#today">5. Follow the Calendar of Wisdom</a></li>
                            <li class="underline-on-hover"><a href="#categories">6. The List of Categories</a></li>
                            <li class="underline-on-hover"><a href="#quote-category">7. Request Quotes by Category </a></li>
                            <li class="underline-on-hover"><a href="#authors">8. The List of Authors</a></li>
                            <li class="underline-on-hover"><a href="#quote-author">9. Request Quotes from a Specific Author</a></li>
                            <li class="underline-on-hover"><a href="#custom">10. Create an Account and Load your Own Quotes</a></li>
                            <li class="underline-on-hover"><a href="#attribution">11. API Usage Attribution</a></li>
                        </ul>
                </section>
        <section class="main-section" id="structure">
            <header class="pt-8 underline-on-hover"><a href="#index">1. Basic API Structure</a></header>
                <article>
                        <p class="pb-6"><strong>The basic elements for an API call are:</strong></p>
                    <div class="editor">
                        <code>
                            <span class="val">http://websiteurl.com/api<span class="arg">/[mode]</span><span class="func">/[filter]</span><span class="keyword">/[api_key]</span>
                        </code>
                    </div>
                </article>
                <article>
                    <p class="pt-6 pb-6"><strong>where:</strong></p>
                    <div class="editor">
                    <code>
                        <span class="val">https://websiteurl.com/api<span class="var"> = Quotes API URL. </span><span class="req">Required</span><br>
                        <span class="arg">[mode]<span class="var"> = Retrieval type <span class="arg">[random, today, quotes, authors, categories] </span><span class="req">Required</span><br>
                        <span class="func">[filter]<span class="var"> = Filter type <span class="func">[author-name, category] </span><span class="str">Optional</span><br>
                        <span class="keyword">[api_key]<span class="var"> = API key for custom quotes with subscription. </span><span class="str">Optional</span>
                    </code>
                    </div>
                </article>
        </section>
        <section class="main-section" id="fetch">
            <header class="pt-8 underline-on-hover"><a href="#index">2. How to Fetch Quotes for your Website or App</a></header>
            <article>
                <p class="pb-6">This is the most efficient way for developers to load quotes.
                    In this example we are going to get a <code class="code">[random]</code>  quote, but you can just change the URL to any endpoint you want.</p>
                <p class="pb-6"><strong>Javascript Code Example</strong></p>
                <div class="editor">
                    <code>
                        <br>
                        <span class="var">
                        &lt;<span class="jeje">script</span> <span class="arg">type </span>= <span class="req"> "text/javascript"</span>><br>
                        <code class="padding-left"><span class="jeje">const </span><span class="arg">api_url</span> = <span class="req"> "https://websiteurl.com/api/random"</span>;<br></code>
                            <code class="padding-left"><span class="jeje">async function </span><span class="val">getapi(</span><span class="arg">url</span><span class="val">)</span><br></code>
                            <code class="padding-left">{<br></code>
                                <code class="padding-left2"> <span class="jeje">const </span><span class="arg">response</span> = <span class="func">await </span><span class="val">fetch</span><span class="func">(</span><span class="arg">url</span><span class="func">)</span>;<br></code>
                                <code class="padding-left2"><span class="jeje">let </span> <span class="arg">data</span> = <span class="func">await </span><span class="arg">response</span>.<span class="val">json</span><span class="func">()</span>;<br></code>
                                <code class="padding-left2"> <span class="arg">console</span>.<span class="val">log</span><span class="func">(</span><span class="arg">data</span><span class="func">)</span>;<br></code>
                            <code class="padding-left">} <br></code>
                        <code class="padding-left"><span class="val">getapi(</span><span class="arg">api_url</span><span class="val">)</span>; <br></code>
                        &lt;/<span class="jeje">script</span>><br>
                        <br>
                        </span>
                    </code>
                </div>
                <p class="pb-6 pt-6"><strong>PHP Code Example</strong></p>
                <div class="editor">
                    <code>
                        <span class="var">
                        <br>
                        <span class="jeje">&lt;?php</span><br>
                            <code class="padding-left"><span class="arg">$curl</span> = <span class="val">curl_init()</span>;<br></code>
                            <code class="padding-left"><span class="val">curl_setopt(</span><span class="arg">$curl</span>, CURLOPT_URL, <span class="req">"https://websiteurl.com/api/random"</span><span class="val">)</span>;<br></code>
                            <code class="padding-left"><span class="val">curl_setopt(</span><span class="arg">$curl</span>, CURLOPT_RETURNTRANSFER, <span class="str">1</span><span class="val">)</span>;<br></code>
                            <code class="padding-left"><span class="arg">$output</span> = <span class="val">curl_exec(</span><span class="arg">$curl</span><span class="val">)</span>;<br></code>
                            <code class="padding-left"><span class="val">curl_close(</span><span class="arg">$curl</span><span class="val">)</span>;<br></code>
                        <span class="jeje">?></span><br>
                        <br>
                        </span>
                    </code>
                </div>
            </article>
        </section>
        <section class="main-section" id="response">
            <header class="pt-8 underline-on-hover"><a href="#index">3. Response</a></header>
                <article>
                    <p class="pb-6">The resulting API data is formatted as a JSON.</p>
                    <div class="editor">
                        <code>
                            <span class="var">{</span><br>
                            <span class="req padding-left">"quote"</span><span class="var">:</span><span class="arg">"I shut my eyes in order to see."</span><span class="var">,</span><br>
                            <span class="req padding-left">"author"</span><span class="var">:</span><span class="arg">"Paul Gaugin"</span><span class="var">,</span><br>
                            <span class="req padding-left">"lifetime"</span><span class="var">:</span><span class="arg">"1848-1903"</span><span class="var">,</span><br>
                            <span class="req padding-left">"characters"</span><span class="var">:</span><span class="str">31</span><br>
                            <span class="var">}</span>
                        </code>
                    </div>
                </article>
        </section>
        <section class="main-section" id="random">
            <header class="pt-8 underline-on-hover"><a href="#index">4. Pull a single, random quote</a></header>
            <article>
                <p class="pb-6">This is the most simple Quotes API request and will generate a single, random quote on each call.<br>
                <p class="pb-6">You may find the <code class="code">[random]</code> mode useful for getting a random quote on every refresh of after some time.
                                <br>This call is also good for students first learning how to use the API.</p>
                <div class="editor">
                <code>
                    <span class="val">http://websiteurl.com/api<span class="arg">/random</span>
                </code>
                </div>
                <p class="pb-2 pt-6"><strong>Example Response</strong></p>
                    <div class="editor">
                        <code>
                            <span class="var">{</span><br>
                            <span class="req padding-left">"quote"</span><span class="var">:</span><span class="arg">"Art is anything you can get away with."</span><span class="var">,</span><br>
                            <span class="req padding-left">"author"</span><span class="var">:</span><span class="arg">"Andy Warhol"</span><span class="var">,</span><br>
                            <span class="req padding-left">"lifetime"</span><span class="var">:</span><span class="arg">"1928-1987"</span><span class="var">,</span><br>
                            <span class="req padding-left">"characters"</span><span class="var">:</span><span class="str">38</span><br>
                            <span class="var">}</span><br>
                        </code>
                    </div>
            </article>
        </section>

        <section class="main-section" id="today">
            <header class="pt-8 underline-on-hover"><a href="#index">5. Follow the Calendar of Wisdom</a></header>
            <article>
                <p class="pb-6">Each day of the year, we feature a single quote from the Leo Tolstoy's book <a href="https://en.wikipedia.org/wiki/A_Calendar_of_Wisdom" class="underline-on-hover" target="_blank"><i>"A Calendar of Wisdom"</i></a>  which you can call using the <code class="code ">[today]</code> mode.
                                <p class="pb-6">To reduce server load, this response should be loaded into your app cache and refreshed daily rather
                                than making a call each time you want to display the quote in your project.
                                New quote is generated at midnight server time <code class="code">(00:00 CST)</code>.</p>
                <div class="editor">
                    <code>
                        <span class="val">http://websiteurl.com/api<span class="arg">/today</span>
                    </code>
                </div>
                <p class="pb-2 pt-6"><strong>Example Response</strong></p>
                    <div class="editor">
                        <code>
                            <span class="var">{</span><br>
                            <span class="req padding-left">"quote"</span><span class="var">:</span><span class="arg">"A book must be the axe for the frozen sea within us."</span><span class="var">,</span><br>
                            <span class="req padding-left">"author"</span><span class="var">:</span><span class="arg">"Franz Kafka"</span><span class="var">,</span><br>
                            <span class="req padding-left">"lifetime"</span><span class="var">:</span><span class="arg">"1883-1924"</span><span class="var">,</span><br>
                            <span class="req padding-left">"characters"</span><span class="var">:</span><span class="str">52</span><br>
                            <span class="var">}</span><br>
                        </code>
                    </div>
            </article>
            </section>

            <section class="main-section" id="categories">
                <header class="pt-8 underline-on-hover"><a href="#index">6. The list of categories</a></header>
                <article>
                    <p class="pb-6">Get a list of available categories to filter your queries. You can also visit <a class="underline-on-hover" href="{{ __('/list-of-categories') }}"><strong>the categories list</strong></p></a>
                    <div class="editor">
                        <code>
                            <span class="val">http://websiteurl.com/api<span class="arg">/categories</span>
                        </code>
                    </div>
                    <p class="pb-6 pt-6"><strong>Example Response</strong></p>
                    <div class="editor">
                        <code>
                            <span class="var">[</span><br>
                            <span class="var padding-left">{</span><br>
                            <span class="req padding-left2">"category"</span><span class="var">:</span><span class="arg">"Art"</span><br>
                            <span class="var padding-left">},</span><br>
                            <span class="var padding-left">{</span><br>
                            <span class="req padding-left2">"category"</span><span class="var">:</span><span class="arg">"Love"</span><br>
                            <span class="var padding-left">}</span><br>
                            <span class="var padding-left">...</span><br>
                            <span class="var">]</span><br>
                        </code>
                    </div>
                </article>
            </section>

            <section class="main-section" id="quote-category">
                <header class="pt-8 underline-on-hover"><a href="#index">7. Request quotes by category</a></header>
                <article>
                    <p class="pb-6">To filter quotes by category, simply use the <code class="code">[quotes]/[categories]</code> mode and add the <code class="code">[category]</code> that you want to the end of your request.
                                    In this case we are going to look for quotes under the category <code class="code">[art]</code>
                    <div class="editor">
                        <code>
                            <span class="val">http://websiteurl.com/api<span class="arg">/quotes/categories</span><span class="func">/[category]</span>
                        </code>
                    </div>
                    <p class="pb-6 pt-6"><strong>Example Response</strong></p>
                    <div class="editor">
                        <code>
                            <span class="var">[</span><br>
                                <span class="var padding-left">{</span><br>
                                <span class="req padding-left">"quote"</span><span class="var">:</span><span class="arg">"Creativity takes courage."</span><span class="var">,</span><br>
                                <span class="req padding-left">"author"</span><span class="var">:</span><span class="arg">"Henri Matisse"</span><span class="var">,</span><br>
                                <span class="req padding-left">"lifetime"</span><span class="var">:</span><span class="arg">"1862-1954"</span><span class="var">,</span><br>
                                <span class="req padding-left">"characters"</span><span class="var">:</span><span class="str">25</span><br>
                                <span class="var padding-left">},</span><br>
                                <span class="var padding-left">{</span><br>
                                <span class="req padding-left">"quote"</span><span class="var">:</span><span class="arg">"Art is a line around your thoughts."</span><span class="var">,</span><br>
                                <span class="req padding-left">"author"</span><span class="var">:</span><span class="arg">"Gustav Klimt"</span><span class="var">,</span><br>
                                <span class="req padding-left">"lifetime"</span><span class="var">:</span><span class="arg">"1869-1918"</span><span class="var">,</span><br>
                                <span class="req padding-left">"characters"</span><span class="var">:</span><span class="str">35</span><br>
                                <span class="var padding-left">}</span><br>
                                <span class="var padding-left">...</span><br>
                            <span class="var">]</span><br>
                        </code>
                    </div>
                </article>
            </section>

        <section class="main-section" id="authors">
            <header class="pt-8 underline-on-hover"><a href="#index">8. The list of authors</a></header>
            <article>
                <p class="pb-6">The <code class="code">[authors]</code> mode generates a list of available authors with some information about their life, a link to the Wikipedia page and the <code class="code">[author-name]</code> filter <i>(a URL-friendly ID derived from the authors name)</i> to use in your queries.
                <div class="editor">
                    <code>
                        <span class="val">http://websiteurl.com/api<span class="arg">/authors</span>
                    </code>
                </div>
                <p class="pb-6 pt-6"><strong>Example Response</strong></p>
                <div class="editor">
                    <code>
                        <span class="var">[</span><br>
                        <span class="var padding-left">{</span><br>
                            <span class="req padding-left">"author"</span><span class="var">:</span><span class="arg">"Henri Matisse"</span><span class="var">,</span><br>
                            <span class="req padding-left">"lifetime"</span><span class="var">:</span><span class="arg">"1862-1954"</span><span class="var">,</span><br>
                            <span class="req padding-left">"nationality"</span><span class="var">:</span><span class="arg">"French"</span><span class="var">,</span><br>
                            <span class="req padding-left">"website"</span><span class="var">:</span><span class="arg">"<u>https://en.wikipedia.org/wiki/Henri_Matisse</u>"</span><span class="var">,</span><br>
                            <span class="req padding-left">"author-name"</span><span class="var">:</span><span class="arg">"henri-matisse"</span><br>
                            <span class="var padding-left">},</span><br>
                            <span class="var padding-left">{</span><br>
                            <span class="req padding-left">"author"</span><span class="var">:</span><span class="arg">"Gustav Klimt"</span><span class="var">,</span><br>
                            <span class="req padding-left">"lifetime"</span><span class="var">:</span><span class="arg">"1869-1918 "</span><span class="var">,</span><br>
                            <span class="req padding-left">"nationality"</span><span class="var">:</span><span class="arg">"Austro-Hungarian"</span><span class="var">,</span><br>
                            <span class="req padding-left">"website"</span><span class="var">:</span><span class="arg">"<u>https://en.wikipedia.org/wiki/Gustav_Klimt</u>"</span><span class="var">,</span><br>
                            <span class="req padding-left">"author-name"</span><span class="var">:</span><span class="arg">"gustav-klimt"</span><br>
                            <span class="var padding-left">}</span><br>
                            <span class="var padding-left">...</span><br>
                            <span class="var">]</span><br>
                    </code>
                </div>
            </article>
        </section>
        <section class="main-section " id="quote-author">
            <header class="pt-8 underline-on-hover"><a href="#index">9. Request Quotes from a Specific Author</a></header>
            <article>
                <p class="pb-6">The <code class="code">[quotes]/[authors]</code> mode in combination with the <code class="code">[author-name]</code> filter is used to generate a batch of quotes by a single author.
                    Henri Matisse in this case.
                                    <div class="editor">
                    <code>
                        <span class="val">http://websiteurl.com/api<span class="arg">/quotes/authors</span><span class="func">/[author-name]</span>
                    </code>
                </div>
                <p class="pb-6 pt-6"><strong>Example Response</strong></p>
                    <div class="editor">
                        <code>
                            <span class="var">[</span><br>
                                <span class="var padding-left">{</span><br>
                                <span class="req padding-left">"quote"</span><span class="var">:</span><span class="arg">"Creativity takes courage."</span><span class="var">,</span><br>
                                <span class="req padding-left">"author"</span><span class="var">:</span><span class="arg">"Henri Matisse"</span><span class="var">,</span><br>
                                <span class="req padding-left">"lifetime"</span><span class="var">:</span><span class="arg">"1862-1954"</span><span class="var">,</span><br>
                                <span class="req padding-left">"characters"</span><span class="var">:</span><span class="str">25</span><br>
                                <span class="var padding-left">},</span><br>
                                <span class="var padding-left">{</span><br>
                                <span class="req padding-left">"quote"</span><span class="var">:</span><span class="arg">"There are always flowers for those who want to see them."</span><span class="var">,</span><br>
                                <span class="req padding-left">"author"</span><span class="var">:</span><span class="arg">"Henri Matisse"</span><span class="var">,</span><br>
                                <span class="req padding-left">"lifetime"</span><span class="var">:</span><span class="arg">"1862-1954"</span><span class="var">,</span><br>
                                <span class="req padding-left">"characters"</span><span class="var">:</span><span class="str">56</span><br>
                                <span class="var padding-left">}</span><br>
                                <span class="var padding-left">...</span><br>
                            <span class="var">]</span><br>
                        </code>
                    </div>
            </article>
        </section>
            <section class="main-section" id="custom">
                <header class="pt-8 underline-on-hover"><a href="#index">10. CREATE AN ACCOUNT AND LOAD YOUR OWN QUOTES</a></header>
                <article>
                    <p class="pb-6">Premium subscribers have the ability to load up to 366 of their own quotes and call them using their private API key.
                       <a href="{{ __('/create') }}" class="underline-on-hover"><strong>Create an account for free</strong></a> and enter each quote from the Admin Panel choosing author, quote and category.
                        To call your custom quotes, use a standard API call and append the <code class="code">[api_key]</code> to the end of the request. The API will now only filter for your custom quotes.<br>
                    <div class="editor">
                        <code>
                            <span class="val ">http://websiteurl.com/api<span class="arg">/random</span><span class="keyword">/[api_key]</span><span class="var"> -> Get a random custom quote</span><br>
                        </code>
                    </div>
                    <br>
                    <div class="editor">
                        <code>
                            <span class="val ">http://websiteurl.com/api<span class="arg">/today</span><span class="keyword">/[api_key]</span><span class="var"> -> Get your custom today quote</span> <br>
                        </code>
                    </div>
                    <br>
                    <div class="editor">
                        <code>
                            <span class="val ">http://websiteurl.com/api<span class="arg">/authors</span><span class="keyword">/[api_key]</span><span class="var"> -> Get all your custom authors</span> <br>
                        </code>
                    </div>
                    <br>
                    <div class="editor">
                        <code>
                            <span class="val ">http://websiteurl.com/api<span class="arg">/quotes</span><span class="keyword">/[api_key]</span><span class="var"> -> Get all your custom quotes</span>
                        </code>
                    </div>
                </article>
                </section>
            <section class="main-section" id="attribution">
            <header class="pt-8 underline-on-hover"><a href="#index">11. API Usage Attribution</a></header>
                <article>
                    <p class="pb-6">You’re welcome to use it for your projects. If you like you can show attribution with a link back to <code class="code">https://sitenameurl.com/ </code>when using this API.</p>
                        <div class="editor">
                            <code>
                                <span class="str">Quotes by <span class="keyword">&lt;a href="http://websiteurl.com/" target="_blank"></span>Quotes API<span class="keyword">&lt;/a></span>
                            </code>
                        </div>
                </article>
            <footer class="text-center">
                <br>
                <a type="button" href="#main-doc" class="text-center inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                    Back to the top
               </a>
                <br>
                <br>
            </footer>
            </section>
    </main>
</body>

