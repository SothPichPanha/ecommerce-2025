<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
          public function getProduct()
    {
        return ["message" => "Getting list of Product"];
    }

    public function createProduct()
    {
        return ["message" => "Creating 1  new product"];
    }                                                                                                                                                                                                                                                                                                                        


    public function updateProduct($productId)
    {
        return ["message" => "Updating product with id: $id"];
    }

    public function deleteProduct($productId)
    {
        return ["message" => "Deleting product with id: $id"];
    }
}
