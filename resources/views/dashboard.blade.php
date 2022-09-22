<x-app-layout>
    <x-slot name="header">
        <h2 class="title-author">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 margin-gross  text-gray-800">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div  class=" text-center bg-white letter-author text-gray-800">
                    Welcome, {{ Auth::user()->name }}!
                </div>
                <div  class="p-6 text-center bg-white ">
                   <p> Your <code>[api_key]</code> is:<br> <br><strong>{{ Auth::user()->api_key }}</strong></p>
                </div>
                <section class="main-section" id="custom">
                    <article >
                           <p> This are the endpoints you can use with your <code class="code">[api_key]</code>.<br>
                            Just copy the bottom endpoints in your code, add your <code class="code">[api_key]</code> at the end and start calling your custom quotes.</p><br>
                           <p class="text-center pb-3"><strong>Get a random custom quote</strong></p>
                           <div class="editor text-center">
                            <code>
                                <span class="val ">http://websiteurl.com/api<span class="arg">/random</span><span class="keyword">/[api_key]</span><br>
                            </code>
                        </div>
                        <br>
                        <p class="text-center pb-3"><strong>Get your today's custom quote</strong></p>
                           <div class="editor text-center">
                            <code>
                                <span class="val ">http://websiteurl.com/api<span class="arg">/today</span><span class="keyword">/[api_key]</span><br>
                            </code>
                        </div>
                        <br>
                        <p class="text-center pb-3"><strong>Get all your custom authors</strong></p>
                           <div class="editor text-center">
                            <code>
                                <span class="val ">http://websiteurl.com/api<span class="arg">/authors</span><span class="keyword">/[api_key]</span><br>
                            </code>
                        </div>
                        <br>
                        <p class="text-center pb-3"><strong>Get all your custom quotes</strong></p>
                           <div class="editor text-center">
                            <code>
                                <span class="val ">http://websiteurl.com/api<span class="arg">/quotes</span><span class="keyword">/[api_key]</span><br>
                            </code>
                        </div>
                    </article>
                </section>
                <br>
                <br>
            </div>
        </div>
    </div>
</x-app-layout>
