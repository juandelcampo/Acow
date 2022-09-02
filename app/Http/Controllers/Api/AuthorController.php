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
        return response()->json(['data' => Author::with('quotes')->get()],200);
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
}
