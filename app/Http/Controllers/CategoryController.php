<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Exception;

class CategoryController extends Controller
{

    public function getAllCategory(Request $request){
        $categoryList = Category::all(['id','name']);

        return response()->json($categoryList);
    }

}
