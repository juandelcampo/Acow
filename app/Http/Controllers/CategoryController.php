<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function get()
    {
        return response()->json(['data' => Category::with('quotes')->with('authors')->get()],200);
    }

    public function add()
    {
        $newCategory =new Category(request()->all());
        $newCategory->save();
        return response()->json($newCategory);
    }


    public function update(Request $request, $categoryId)
    {
        $data = $request->json()->all();
        $category = Category::find($categoryId);
        $category->update($data);
        return response()->json($category);
    }


    public function delete($categoryId)
    {
        $category = Category::find($categoryId);
        $result = $category->delete();

        if($result)
            return ["result"=>"succes"];
        else
            return ["result"=>"fail"];
    }
}
