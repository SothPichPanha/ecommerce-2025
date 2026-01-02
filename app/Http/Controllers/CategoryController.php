<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getCategories()
    {
        $categories = Category::all();
        return response()->json([
            "message" => "Getting all categories",
            "data" => $categories
        ]);
    }

    public function createCategory(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = Category::create($validated);

        return response()->json([
            "message" => "Creating 1 new category",
            "data" => $category
        ], 201);
    }

    public function updateCategory(Request $request, $categoryId)
    {
        $category = Category::findOrFail($categoryId);

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
        ]);

        $category->update($validated);

        return response()->json([
            "message" => "Updating category with id: $categoryId",
            "data" => $category
        ]);
    }

    public function deleteCategory($categoryId)
    {
        $category = Category::findOrFail($categoryId);
        $category->delete();

        return response()->json([
            "message" => "Deleting category with id: $categoryId"
        ]);
    }
}