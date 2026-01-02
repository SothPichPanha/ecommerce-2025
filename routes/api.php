<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('welcome'); });

Route::get('/categories', [CategoryController::class, 'getCategories']);
Route::post('/categories', [CategoryController::class, 'createCategory']);
Route::put('/categories/{categoryId}', [CategoryController::class, 'updateCategory']);
Route::delete('/categories/{categoryId}', [CategoryController::class, 'deleteCategory']);


Route::get('/products', [ProductController::class, 'getProducts']);
Route::post('/products/product', [ProductController::class, 'createProduct']);
Route::put('/products/{productId}', [ProductController::class, 'updateProduct']);
Route::delete('/products/{productId}', [ProductController::class, 'deleteProduct']);