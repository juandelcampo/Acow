<?php

namespace App\Http\Controllers\Api;

use App\Models\Author;
use App\Models\User;
use App\Http\Requests\AuthorRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class AuthorController extends Controller
{
    //---PUBLIC---//

    public function get():JsonResponse
    {
        $authors = Author::where('user_id', 1)
                            ->get();


        foreach ($authors as $author)
        {
            $collect[] = [
                        'author' => $author->author,
                        'lifetime' => $author->lifetime,
                        'nationality' => $author->nationality,
                        'website' => $author->url,
                        'author-name' => $author->tag
            ];
        }

        return response()->json($collect,200);
    }


    //----CUSTOM----//

    public function customAuthors($apiKey):JsonResponse
    {
        $users = User::where('api_key', $apiKey)
                        ->select('id')
                        ->get();

        foreach ($users as $user){
            $id = $user->id;
        }

        $authors = Author::where('user_id', $id)
                            ->get();

        foreach ($authors as $author){
            $collect[]=[
                        'author' => $author->author,
                        'lifetime' => $author->lifetime,
                        'nationality' => $author->nationality,
                        'website' => $author->url
            ];
        }

        if($author->user->api_key == $apiKey){
            return response()->json($collect,200);
        } else {
            return response()->json('Are you sure that the key is OK?',400);
        }
    }


    //---PROTECTED---//


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
