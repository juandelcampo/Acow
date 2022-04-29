<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getAllCategories()
    {
            return response()->json(['data' => Category::get()],200);

    }

    public function addNewCategory(Request $request)
    {
        $newCategory  = new Category;
        $newCategory -> category = request('category');
        $newCategory -> save();
            return response()->json($newCategory);

    }


    public function updateCategory(Request $request, $categoryId)
    {
        $category = Category::find($categoryId);
        $category->category = $request->category;
        $category->save();
            return response()->json($category);

    }


    public function deleteCategory($categoryId)
    {
        $category = Category::find($categoryId);
        $result = $category->delete();

        if($result)
            return ["result"=>"succes"];

        else
            return ["result"=>"fail"];

    }
}

