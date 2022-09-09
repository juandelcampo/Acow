<x-app-layout>
    <x-slot name="header">
        <h2 class="letter-author text-center">
            {{ __('Update a Category') }}
        </h2>
    </x-slot>
        <div class="max-w-7xl mx-auto table-header">
            <form method="POST" action= "/categories/update/{categoryId}" enctype="multipart/form-data"> @csrf
            <br>
                    <input type="hidden" name="id" value="{{$category->id}}">
                <div>
                    <input name="category" type="text" required placeholder="Author" value="{{$category->category}}" class="w-full px-4 py-2 rounded focus:outline-none focus:text-gray-600"/>
                        @error('category') <div class="isa-error">{{ $message }} </div> @enderror
                </div>
                    <br>
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                        Update Category
                </button>
            </form>
</x-app-layout>
