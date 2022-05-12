<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Authors List</title>
</head>
<body>
    <x-header-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        You're logged in!
                    </div>
                </div>
            </div>
        </div>
    </x-header-app-layout>


    <h2>Authors List</h2>


    @if(session('success'))
    <div class="alert alert-success" role="alert">
        <ul>
            <li>{{session('success')}}</li>
        </ul>
    </div>
    @endif

    </div>
        @if ($errors->any())
        <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class='actionbutton'>
        <a class='btn btn-info float-right' href="{{route('authors.create')}}">Add</a>
            <br>
        </div>
        <div class="max-w-7xl text-justify">@if($errors->any())
            <div class="w-full bg-red-500 p-2 text-center my-2 text-white">
                {{$errors->first()}}
            </div>
            @endif

    <br>
    <table class="table table-striped table-dark table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col" style="width: 5px;" >Id</th>
                <th scope="col"style="width: 220px;">Author</th>
                <th scope="col"style="width: 100px;">Lifetime</th>
                <th scope="col"style="width: 110px;">Nationality</th>
                <th scope="col"style="width: 300px;">URL</th>
                <th scope="col"style="width: 15px;"></th>

            </tr>
        </thead>
        <tbody>
            <tr>

        @foreach($authors as $author)
        <tr>
            <td>{{$author['id']}}</td>
            <td>{{$author['author']}}</td>
            <td>{{$author['lifetime']}}</td>
            <td>{{$author['nationality']}}</td>
            <td>{{$author['url']}}</td>
            <td style="width: 10px;">
                <!-- Edit -->
                <a href="{{ route('authors.edit',[$author->id]) }}" class="btn btn-sm btn-info">Edit</a>
                <!-- Delete -->
                <a href="{{ route('authors.delete',[$author->id]) }}" class="btn btn-sm btn-danger">Delete</a>
             </td>
        </tr>
        </tbody>
        @endforeach
    </table>

    <span>
        {{$authors->links()}}

    </span>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->

  </body>
</html>
