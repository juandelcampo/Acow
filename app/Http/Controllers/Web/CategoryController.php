<?php

namespace App\Http\Controllers\Web;

use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        if ((Auth::user()->is_permission) == 1)
        {
            $categories = Category::paginate(15);
        } else {
            $user = Auth::user()->id;
            $categories = Category::where('user_id', '=', $user)->paginate(15);
        }
        return view('categories-index', ['categories' => $categories]);
    }

    public function create()
    {
        return view('categories-add');
    }

    public function store(CategoryRequest $request)
    {
        $request->validateStructure();
        $category = new Category();
        $category->user_id = Auth::user()->id;
        $category->category = $request->category;
        $category->save();

        return redirect()->route('categories.index')->with('success','Category Created successfully.');
    }

    public function edit($categoryId)
    {
        if ((Auth::user()->is_permission) == 1)
        {
            $category = Category::find($categoryId);
        } else {
            $user = Auth::user()->id;
            $category = Category::where('user_id', '=', $user)->find($categoryId);
        }

        return view('categories-edit', ['category'=>$category]);
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $request->validateStructure();
        $category = Category::find($request->id);
        $category->category = $request->category;
        $category->save();
        return redirect('/categories')->with('success', 'Category Updated successfully');
    }

    public function delete($categoryId)
    {
        $category = Category::find($categoryId);
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category Deleted successfully');
    }
}

