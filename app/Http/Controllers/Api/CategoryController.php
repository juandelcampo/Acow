<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    public function get():JsonResponse
    {
        $categories = Category::where('user_id', 1)
                                ->orderBy('category', 'asc')
                                ->get();

        foreach ($categories as $category)
        {
            $collect[] = [
                        'category' => $category->category
            ];
        }

        return response()->json($collect, 200);
    }

    public function add(CategoryRequest $request):JsonResponse
    {
        $request->validateStructure();
        $newCategory = new Category(request()->all());
        $newCategory->save();

        return response()->json($newCategory);
    }

    public function update(CategoryRequest $request, int $categoryId):JsonResponse
    {
        $request->validateStructure();
        $data = $request->json()->all();
        $category = Category::find($categoryId);
        $category->update($data);

        return response()->json($category);
    }

    public function delete(int $categoryId):JsonResponse
    {
        $category = Category::find($categoryId);
        $result = $category->delete();

        return response()->json(($result) ? 'success' : 'fail');
    }
}
