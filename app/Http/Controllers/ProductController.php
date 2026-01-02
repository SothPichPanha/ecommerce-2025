<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getProducts()
    {
        $products = Product::all();
        return response()->json([
            "message" => "Getting all products",
            "data" => $products
        ]);
    }

    public function createProduct(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $product = Product::create($validated);

        return response()->json([
            "message" => "Creating 1 new product",
            "data" => $product
        ], 201);
    }

    public function updateProduct(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
        ]);

        $product->update($validated);

        return response()->json([
            "message" => "Updating product with id: $productId",
            "data" => $product
        ]);
    }

    public function deleteProduct($productId)
    {
        $product = Product::findOrFail($productId);
        $product->delete();

        return response()->json([
            "message" => "Deleting product with id: $productId"
        ]);
    }
}