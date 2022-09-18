<?php

namespace App\Http\Controllers\Api;

use App\Models\Author;
use App\Http\Requests\AuthorRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

// Code Review
// Validar que las rutas funcionen con SAD and Happy paths
// Autor inexistente, sin nombre, etc

class AuthorController extends Controller
{
    public function get():JsonResponse
    {
        $authors = Author::select('author', 'lifetime')
                        ->where('user_id', 1)
                        ->get();

        return response()->json($authors,200);
    }

    public function add(AuthorRequest $request):JsonResponse
    {
        $request->validateStructure();
        $newAuthor = new Author(request()->all());
        $newAuthor->save();

        return response()->json($newAuthor);
    }

    public function update(AuthorRequest $request, int $authorId):JsonResponse
    {
        $request->validateStructure();
        $data = $request->json()->all();
        $author = Author::find($authorId);
        $author->update($data);

        return response()->json($author);
    }

    public function delete(int $authorId):JsonResponse
    {
        $author = Author::find($authorId);
        $result = $author->delete();

        return response()->json(($result) ? 'success' : "fail");
    }

    //----CUSTOM----//

    public function customAuthors($apiKey):JsonResponse
    {
        $authors = Author::with('user')->get();

        foreach ($authors as $author){
            $collect[]=[
                'author' => $author->author,
                'lifetime' => $author->lifetime,
            ];
        }

        if($author->user->api_key == $apiKey){
            return response()->json($collect,200);
        } else {
            return response()->json('Are you sure that the key is OK?',400);
        }
    }


}
