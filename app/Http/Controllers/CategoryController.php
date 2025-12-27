<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
        public function getCategories()
    {
        return ["message" => "Getting list of categories"];
    }

    public function createCategory()
    {
        return ["message" => "Creating 1  new category"];
    }                                                                                                                                                                                                                                                                                                                        


    public function updateCategory($categoryId)
    {
        return ["message" => "Updating category with id: $id"];
    }

    public function deleteCategory($categoryId)
    {
        return ["message" => "Deleting category with id: $id"];
    }

    
}
