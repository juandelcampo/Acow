<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl  text-gray-800 leading-tight">
            {{ __('Advices') }}
        </h2>
    </x-slot>
        <div class="max-w-7xl mx-auto table-header">
            <form method="GET" action= "/categories/store" enctype="multipart/form-data"> @csrf
                <br>
                <div>

@foreach ($advices as $advice)
<h1>{{  $advice->advice }}</h1>
@endforeach


                </div>











</x-app-layout>
