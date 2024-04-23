<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Item;
use App\Models\Table;

use Exception;

class MenuController extends Controller
{
    public function homeCategory(Request $request)
    {

        $categories = Category::all();

        if($request->table){

            $table = Table::where("code",$request->table)->first();

            if(!$table){
                //return response('Table not found');
                abort(404);
            }

            $request->session()->put('table', $table->description);
        }

        return view('modules.client.home', ['categories' => $categories, 'table'=>$request->table]);
    }

    public function getCategoryItems($name, Request $request){
        $categoryID = Category::where("name",$name)->value("id");

        $items = item::where("categoryID",$categoryID)->get();
        return view('modules.client.itemMenuResult', ['items' => $items])->render();   
    }


}
