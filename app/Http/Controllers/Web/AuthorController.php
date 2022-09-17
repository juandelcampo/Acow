<?php

namespace App\Http\Controllers\Web;

use App\Models\Author;
use App\Models\Quote;
use App\Http\Requests\AuthorRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class AuthorController extends Controller
{

    //---ADMIN---

    public function index()
    {
        if(Auth::user()->is_permission == 1){
        $authors = Author::paginate(15);
    } else {
        $user = Auth::user()->id;
        $authors = Author::where('user_id', '=', $user)->paginate(15);
    }

        return view('authors-index', ['authors' => $authors]);
    }

    public function create()
    {
        return view('authors-add');
    }

    public function store(AuthorRequest $request)
    {
        $request->validateStructure();
        $author = new Author();
        $author->user_id = Auth::user()->id;
        $author->author = $request->author;
        $author->lifetime = $request->lifetime;
        $author->nationality = $request->nationality;
        $author->url = $request->url;
        $author->save();

        $author->save();
        return redirect()->route('authors.index')->with('success','Author created successfully.');
    }

    public function edit($authorId)
    {
        if(Auth::user()->is_permission == 1){
            $author = Author::find($authorId);
        } else {
        $user = Auth::user()->id;
        $author = Author::where('user_id', '=', $user)->find($authorId);
        }
        return view('authors-edit', ['author' => $author]);
    }

    public function update(AuthorRequest $request, Author $author)
    {
        $request->validateStructure();
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

    //---PUBLIC--//

    public function listOfAuthors()
    {
        $authors = Author::orderBy('author')->get();
        $id = Author::orderBy('id')->get();

        return view('list-of-authors', ['authors' => $authors, 'id'=>$id]);
    }

    public function authorQuotes($authorId)
    {
        $author = Author::find($authorId);
        $quotes = Quote::where('author_id', $authorId)->get();
        $authors = Author::orderBy('author')->get();

        return view('author-quotes', ['author' => $author, 'quotes' => $quotes, 'authors' => $authors]);
    }

}
