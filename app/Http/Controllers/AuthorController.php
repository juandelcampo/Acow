<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
    public function get()
    {
        return response()->json(['data' => Author::with('quotes')->get()],200);
    }

    public function add()
    {
        $newAuthor = new Author(request()->all());
        $newAuthor->save();
        return response()->json($newAuthor);
    }


    public function update(Request $request, $authorId)
    {
        $data = $request->json()->all();
        $author = Author::find($authorId);
        $author->update($data);
        return response()->json($author);
    }


    public function delete($authorId)
    {
        $author = Author::find($authorId);
        $result = $author->delete();

        if($result)
            return ["result"=>"succes"];
        else
            return ["result"=>"fail"];
    }
}
