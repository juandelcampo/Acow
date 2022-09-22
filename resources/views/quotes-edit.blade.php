<x-app-layout>
    <x-slot name="header">
        <h2 class="letter-author text-center">
            {{ __('Update a Quote') }}
        </h2>
    </x-slot>
        <div class="max-w-7xl mx-auto table-header">
            <form method="POST" action="/quotes/update/{{$quote->id}}" enctype="multipart/form-data"> @csrf
            <br>
            <input type="hidden" name="id" value="{{$quote->id}}">
                <div class="flex justify-center">
                    <div class="mb-3 xl:w-96">
                    <select value="{{$quote->author_id}}" name= "author_id" class ="form-select appearance-none block px-3 py-1.5 text-base text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-outm-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none select-form overflow-y-auto" aria-label="">
                        <option disabled selected>Select an Author</option>
                        @foreach ($authors as $author)
                            @if ($author['author'])
                                <option
                                    value="{{$author ['id']}}"
                                    @if ($author['id'] == $quote->author_id )
                                        selected="selected"
                                    @endif
                                >
                                {{$author['author']}}</option>
                            @endif
                        @endforeach
                        @error('author_id') <div class="isa-error">{{ $message }} </div> @enderror
                    </select>
                </div>
                    <br>
                <div>
                    <input name="publish_date" value= "{{$quote->publish_date}}"type="text" required placeholder="Publish date (mm-dd)" class="w-full px-4 py-2 rounded focus:outline-none focus:text-gray-600">
                        @error('publish_date') <div class="isa-error">{{ $message }} </div> @enderror
                </div>
            </div>
                    <br>
                <div>
                    <input name="quote" value = "{{$quote->quote}}" type="text" required placeholder="Quote" class="w-full px-4 py-2 rounded focus:outline-none focus:text-gray-600">
                        @error('quote') <div class="isa-error"> {{ $message }}</div>@enderror
                </div>
                    <br>
                <div>
                    <div class="flex justify-center">
                        <div>
                           <div class="form-check">
                                @foreach ($categories as $category)
                                <label class="form-check-inline">
                                    <input
                                        class="form-check-input"
                                        type="checkbox"
                                        name="categories[]"
                                        value={{ $category['id'] }}
                                        {{ $category['selected'] ? 'checked' : '' }}
                                    >
                                    {{ $category['category'] }}
                                </label>
                            @endforeach
                            </div>
                        </div>
                    </div>
                    @error ('url') <div class="isa-error">{{ $message }} </div> @enderror
                </div>
                    <br>
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                    Update Quote
            </button>
    </form>
</x-app-layout>
