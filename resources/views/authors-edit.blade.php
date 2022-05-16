<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl  text-gray-800 leading-tight">
            {{ __('Add an Author') }}
        </h2>
    </x-slot>
        <div class="max-w-7xl mx-auto table-header">
            <form method="POST" action= "/authors/update/{authorId}" enctype="multipart/form-data"> @csrf
            <br>
                    <input type="hidden" name="id" value="{{$author->id}}">
                <div>
                    <input name="author" type="text" required placeholder="Author" value="{{$author->author}}" class="w-full px-4 py-2 rounded focus:outline-none focus:text-gray-600"/>
                        @error('author') <div class="isa-error">{{ $message }} </div> @enderror
                </div>
                    <br>
                <div>
                    <input name="lifetime" type="text" required placeholder="Lifetime" value="{{$author->lifetime}}" class="w-full px-4 py-2 rounded focus:outline-none focus:text-gray-600">
                        @error('lifetime') <div class="isa-error">{{ $message }} </div> @enderror
                </div>
                    <br>
                <div>
                    <input name="nationality" type="text" required placeholder="Nationality" value="{{$author->nationality}}" class="w-full px-4 py-2 rounded focus:outline-none focus:text-gray-600">
                        @error('nationality') <div class="isa-error"> {{ $message }}</div>@enderror
                </div>
                    <br>
                <div>
                    <input name="url" type="text" required placeholder="URL" value="{{$author->url}}" class="w-full px-4 py-2 rounded focus:outline-none focus:text-gray-600">
                    @error ('url') <div class="isa-error">{{ $message }} </div> @enderror
                </div>
                    <br>
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                    Update Author
            </button>
    </form>
</x-app-layout>
