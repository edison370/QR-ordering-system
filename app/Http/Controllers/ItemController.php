<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    /**
     * Display all users.
     */
    public function getAll(Request $request)
    {
        $items = Item::paginate(20);

        //remove page request
        $requestUrl = str_replace('&page='.$request->page,'',$_SERVER["REQUEST_URI"]);

        return view('report.itemListResult', [
            'items' => $items, 'requestUrl' =>$requestUrl
        ])->render();
    }

    public function updateItem(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:30',
        ]);


        return redirect('/itemList')->with('success', 'Successfully updated!');
    }

    public function createItem(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:30',

        ]);

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('upload'), $imageName);

        return redirect('/itemList')->with('success', 'Successfully added!');
    }

    public function getItem($id, Request $request)
    {
        $item = Item::findOrFail($id);
        return view('modals.editItemModal', ['item' => $item]);
    }
}
