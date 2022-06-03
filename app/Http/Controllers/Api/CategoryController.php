<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use App\Http\Controllers\Controller;


// Code Review
// Validar que las rutas funcionen con SAD and Happy paths

class CategoryController extends Controller
{
    public function get()
    {
        return response()->json(['data' => Category::with('quotes')->get()], 200);
    }

    public function add(CategoryRequest $request)
    {
        $request->validated();
        $newCategory = new Category(request()->all());
        $newCategory->save();

        return response()->json($newCategory);
    }


    public function update(CategoryRequest $request, $categoryId) // Tipar el input y el output
    {
        $request->validate();
        $data = $request->json()->all();
        $category = Category::find($categoryId);
        $category->update($data);

        return response()->json($category);
    }


    public function delete($categoryId) // Tipar el input y el output
    {
        $category = Category::find($categoryId);
        $result = $category->delete();

        if ($result)
            return ["result" => "success"];
        else
            return ["result" => "fail"]; // Falla cuando no viene id
    }
}
