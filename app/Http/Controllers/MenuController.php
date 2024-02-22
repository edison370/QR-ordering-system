<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Item;

class MenuController extends Controller
{
    public function homeCategory(Request $request)
    {

        $categories = Category::all();


        return view('modules.client.home', ['categories' => $categories]);

    }

    public function getCategoryItems($name, Request $request){
        $categoryID = Category::where("name",$name)->value("id");

        $items = item::where("categoryID",$categoryID)->get();
        return view('modules.client.itemMenuResult', ['items' => $items])->render();   
    }

    
}
