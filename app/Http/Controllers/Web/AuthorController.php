<?php

namespace App\Http\Controllers\Web;

use App\Models\Author;
use App\Http\Requests\AuthorRequest;
use App\Http\Controllers\Controller;


class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::paginate(15);
        return view('authors-index', ['authors' => $authors]);
    }

    public function create()
    {
        return view('authors-add');
    }

    public function store(AuthorRequest $request)
    {
        $request->validated();
        Author::create($request->all());

        return redirect()->route('authors.index')->with('success','Author created successfully.');
    }

    public function edit($authorId)
    {
        $author = Author::find($authorId);
        return view('authors-edit', ['author'=>$author]);
    }

    public function update(AuthorRequest $request, Author $author)
    {
        $request->validated();
        $author = Author::find($request->id);
        $author->author = $request->author;
        $author->lifetime = $request->lifetime;
        $author->nationality = $request->nationality;
        $author->url = $request->url;
        $author->save();

        return redirect('/authors')->with('success', 'Author updated successfully');
    }

    public function delete($authorId)
    {
        $author = Author::find($authorId);
        $author->delete();

        return redirect()->route('authors.index')->with('success', 'Author deleted successfully');
    }
}
