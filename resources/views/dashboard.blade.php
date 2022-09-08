<x-app-layout>
    <x-slot name="header">
        <h2 class="title-author">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 margin-gross ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div  class="p-6 text-center bg-white border-b border-gray-200 letter-author">
                    Welcome, {{ Auth::user()->name }}!
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
