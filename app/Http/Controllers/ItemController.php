<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItmeController extends Controller
{
    /**
     * Display all users.
     */
    public function getAll(Request $request)
    {
        $name = $request->name ? : "";
        //$offer = ($request->offer !== null ? $request->offer : 0) ;

        $users = Item::where('name', 'LIKE', "%".$name."%")->paginate(1);

        //remove page request
        $requestUrl = str_replace('&page='.$request->page,'',$_SERVER["REQUEST_URI"]);

        return view('report.UserReportList', [
            'users' => $users, 'requestUrl' =>$requestUrl
        ])->render();
    }

    public function editItem(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:30',
            'email' => 'required|max:30',
        ]);


        return redirect('/userList')->with('success', 'Successfully updated!');   ;
    }

    public function getItem($id, Request $request)
    {
        $user = Item::findOrFail($id);
        return view('report.editUserModal', ['user' => $user]);
    }
}
