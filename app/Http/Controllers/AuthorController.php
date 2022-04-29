<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
    public function getAllAuthors()
    {
            return response()->json(['data' => Author::get()],200);

    }

    public function addNewAuthor(Request $request)
    {
        $newAuthor = new Author;
        $newAuthor -> author = request('author');
        $newAuthor -> lifetime = request('lifetime');
        $newAuthor -> nationality = request('nationality');
        $newAuthor -> url = request('url');
        $newAuthor -> save();
            return response()->json($newAuthor);

    }


    public function updateAuthors(Request $request, $authorId)
    {
        $author = Author::find($authorId);
        $author->author = $request->author;
        $author->lifetime = $request->lifetime;
        $author->nationality = $request->nationality;
        $author->url = $request->url;
        $author->save();
            return response()->json($author);

    }


    public function deleteAuthor($authorId)
    {
        $author = Author:: find($authorId);
        $result = $author->delete();

        if($result)
            return ["result"=>"succes"];

        else
            return ["result"=>"fail"];

    }
}



