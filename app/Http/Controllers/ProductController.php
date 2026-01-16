<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function getProducts()
    {
        $products = Product::all();
        return response()->json($products);
    }

    public function createProduct(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|integer|exists:categories,id',
            'price' => 'required|integer',
            'description' => 'sometimes|string',
            'images' => 'sometimes|json ',
        ]);
        $product = Product::create($validated);
        return response()->json($product, 201);
    }

    
    public function getProduct($productId)
    {
        $product = Product::find($productId);
        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }
        return response()->json($product);
    }

    
    public function updateProduct(Request $request, $productId)
    {
        $product = Product::find($productId);
        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|integer',
            'category_id' => 'required|integer|exists:categories,id',
            'description' => 'sometimes|string',
            'images' => 'sometimes|json',
        ]);
        $product->update($validated);
        return response()->json($product);
    }

    public function deleteProduct($productId)
    {
        $product = Product::find($productId);
        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }
        $product->delete();
        return response()->json(['message' => 'Product deleted']);
    }
    public function store(Request $request)
    {
        $user = $request->user();

        // Check if user has manager or admin role
        if (!$user->roles()->whereIn('name', ['manager', 'admin'])->exists()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $validated = $request->validate([
            'name' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric',
        ]);

        $product = Product::create($validated);

        return response()->json($product, 201);
    }
}