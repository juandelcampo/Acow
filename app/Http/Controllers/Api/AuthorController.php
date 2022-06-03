<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Http\Requests\AuthorRequest;
use App\Http\Controllers\Controller;

// Code Review
// Validar que las rutas funcionen con SAD and Happy paths
// Autor inexistente, sin nombre, etc


class AuthorController extends Controller
{
    public function get() // Tipar  el output
    {
        return response()->json(['data' => Author::with('quotes')->get()],200);
    }

    public function add(AuthorRequest $request)
    {
        $request->validated();
        $newAuthor = new Author(request()->all());
        $newAuthor->save();

        return response()->json($newAuthor);
    }


    public function update(AuthorRequest $request, int $authorId) // Tipar el input y el output
    {
        $request->validated();
        $data = $request->json()->all();
        $author = Author::find($authorId);
        $author->update($data);

        return response()->json($author);
    }


    public function delete($authorId) // El retorno deberia de igual tipo al resto de los endpoints
    {
        $author = Author::find($authorId);
        $result = $author->delete();

        if($result)
            return ["result"=>"succes"];
        else
            return ["result"=>"fail"];
    }
}
