<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;
use Exception;

class ItemController extends Controller
{

    public function getAll(Request $request)
    {
        $items = Item::paginate(20);

        //remove page request
        $requestUrl = str_replace('&page=' . $request->page, '', $_SERVER["REQUEST_URI"]);

        return view('report.itemListResult', [
            'items' => $items, 'requestUrl' => $requestUrl
        ])->render();
    }

    public function updateItem(Request $request, $id)
    {
        try {
            $item = item::find($id);
        } catch (Exception $ex) {
            return back()->withErrors('Item not found');
        }

        $validated = $request->validate([
            'name' => 'required|max:30',
            'description' => 'required|max:80',
            'price' => 'required|numeric|between:0.1,99999999999999',
            'category' => 'required',
        ]);

        try {
            $categoryID = category::find($request->category)->id;
        } catch (Exception $ex) {
            return back()->withErrors('Category not found');
        }

        if ($request->image) {

            $validated = $request->validate([
                'image' => 'mimes:jpeg,jpg,png|required|max:10000',
            ]);

            $imageName = time() . '.' . $request->image->extension();

            $request->image->move(public_path('upload'), $imageName);

            $imagePath = "/upload/" . $imageName;
            $item->imagePath = $imagePath;
        }

        $item->name = $request->name;
        $item->description = $request->description;
        $item->categoryID = $categoryID;
        $item->price = $request->price;
        $item->save();

        return redirect('/itemList')->with('success', 'Successfully updated!');
    }

    public function createItem(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:30',
            'description' => 'required|max:80',
            'image' => 'mimes:jpeg,jpg,png|required|max:10000',
            'price' => 'required|numeric|between:0.1,99999999999999',
            'category' => 'required',
        ]);

        try {
            $categoryID = category::find($request->category)->id;
        } catch (Exception $ex) {
            return back()->withErrors('Category not found');
        }

        $imageName = time() . '.' . $request->image->extension();

        $request->image->move(public_path('upload'), $imageName);

        $imagePath = "/upload/" . $imageName;

        $item = new Item;
        $item->name = $request->name;
        $item->description = $request->description;
        $item->imagePath = $imagePath;
        $item->categoryID = $categoryID;
        $item->price = $request->price;
        $item->save();

        return redirect('/itemList')->with('success', 'Successfully added!');
    }

    public function getItem($id, Request $request)
    {
        $item = Item::find($id);
        return view('modals.editItemModal', ['item' => $item]);
    }

    public function addToCart(Request $request)
    {
        try {
            $newItem["quantity"] = $request->count;
            $newItem["id"] = $request->id;
            $newItem["remark"] = $request->remark;
        } catch (Exception $ex) {
            return back()->withErrors('Item not found');
        }

        if ($request->hasCookie('item_data')) {
            $itemData = unserialize($request->cookie('item_data'));
            array_push($itemData, $newItem);
        } else {
            $itemData[] = $newItem;
        }

        $cookie = cookie('item_data', serialize($itemData));

        return response("Successfully added item into cart")->cookie($cookie);
    }

    public function getCartItems(Request $request)
    {
        $total = 0;
        $itemData = unserialize($request->cookie('item_data'));

        if($itemData){
            foreach($itemData as $item){
                $temp = Item::find($item["id"])->getRawOriginal();

                $temp["subTotal"] = $item["quantity"] * floatval($temp["price"]);
                $temp["quantity"] = $item["quantity"];
                $temp["remark"] = $item["remark"] ? : "";

                $total += $temp["subTotal"];
                $temp["price"] = number_format($temp["price"], 2, '.', ',');
                $temp["subTotal"] = number_format($temp["subTotal"], 2, '.', ',');

                $itemList[] = $temp;

            }
        }else{
            $itemList = null;
        }

        $data["item"] = $itemList;
        $data["total"] = number_format($total, 2, '.', ',');

        return response()->json($data);
    }

    public function changeCartQuantity(Request $request){
        $itemData = unserialize($request->cookie('item_data'));

        if($request->action == "add"){
            $itemData[$request->row]["quantity"] += 1;
        } else {
            $itemData[$request->row]["quantity"] -= 1;
        }

        if($itemData[$request->row]["quantity"] == 0){
            //unset($itemData[$request->row]);
            array_splice($itemData, $request->row, 1);
        }

        $cookie = cookie('item_data', serialize($itemData));
        
        return response("Quantity changed!")->cookie($cookie);
    }
}
